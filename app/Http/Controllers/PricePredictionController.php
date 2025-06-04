<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class PricePredictionController extends Controller
{
    public function showPredictionForm()
    {
        $products = Transaksi::with('sayur')
            ->get()
            ->pluck('sayur.nama_sayur')
            ->unique()
            ->values();
        // $products = transaksi::distinct('product_name')->pluck('product_name');
        return view('owner.prediction-form', compact('products'));
    }

    public function predict(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'time_range' => 'required|in:daily,weekly,monthly',
            'periods' => 'required|integer|min:1|max:24',
            'p' => 'required|integer|min:0|max:5',
            'd' => 'required|integer|min:0|max:2',
            'q' => 'required|integer|min:0|max:5',
            'P' => 'required|integer|min:0|max:5',
            'D' => 'required|integer|min:0|max:2',
            'Q' => 'required|integer|min:0|max:5',
            'seasonal_period' => 'required|integer|min:1'
        ]);

        // Ambil data historis
        $historicalData = $this->getHistoricalData($request);

        if ($historicalData->isEmpty()) {
            return back()->with('error', 'Data historis tidak ditemukan');
        }

        // Proses data untuk SARIMA
        $timeSeries = $historicalData->pluck('price')->toArray();
        $dates = $historicalData->pluck('date')->toArray();

        // Lakukan prediksi SARIMA
        try {
            $predictions = $this->sarimaPredict(
                $timeSeries,
                $request->p,
                $request->d,
                $request->q,
                $request->P,
                $request->D,
                $request->Q,
                $request->seasonal_period,
                $request->periods
            );
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat prediksi: ' . $e->getMessage());
        }

        // Generate tanggal prediksi
        $predictionDates = $this->generatePredictionDates(
            end($dates),
            $request->periods,
            $request->time_range
        );

        // Hitung rekomendasi
        $recommendation = $this->calculateRecommendation($predictions);

        $modelEvaluation = [
            'rmse' => $predictions['accuracy']['RMSE'] ?? null,
            'mae' => $predictions['accuracy']['MAE'] ?? null,
            'aic' => $predictions['accuracy']['AIC'] ?? null
        ];

        return view('owner.prediction-results', [
            'historical' => $historicalData,
            'predictions' => array_combine($predictionDates, $predictions),
            'recommendation' => $recommendation,
            'parameters' => $request->only(['p', 'd', 'q', 'P', 'D', 'Q', 'seasonal_period']),
            'model_evaluation' => $modelEvaluation,
            'model_info' => $predictions['model_info'] ?? null
        ]);
    }

    protected function getHistoricalData($request)
    {
        // $query = transaksi::where('product_name', $request->product)
        //     ->orderBy('date');
        $query = Transaksi::whereHas('sayur', function ($q) use ($request) {
            $q->where('nama_sayur', $request->product);
        })->orderBy('date');

        // Sesuaikan jumlah data berdasarkan kebutuhan
        $daysLookback = 365 * 2; // 2 tahun data
        return $query->where('date', '>=', now()->subDays($daysLookback))->get();
    }

    protected function sarimaPredict(
        array $series,
        int $p,
        int $d,
        int $q,
        int $P,
        int $D,
        int $Q,
        int $seasonalPeriod,
        int $periods
    ) {
        // Implementasi aktual tergantung library yang digunakan
        // Ini contoh menggunakan PHP-ML (sederhana)

        // Dalam praktik, sebaiknya gunakan R/Python untuk SARIMA yang lebih akurat
        // Ini hanya ilustrasi

        $n = count($series);
        $predictions = [];

        // Model sederhana dengan trend dan seasonality
        $trend = ($series[$n - 1] - $series[0]) / $n;

        // Deteksi pola musiman
        $seasonalPattern = $this->detectSeasonalPattern($series, $seasonalPeriod);

        for ($i = 1; $i <= $periods; $i++) {
            $base = $series[$n - 1] + ($trend * $i);

            // Tambahkan komponen musiman
            $seasonalIndex = ($n + $i - 1) % $seasonalPeriod;
            $seasonalEffect = $seasonalPattern[$seasonalIndex] ?? 0;

            $predictions[] = $base + $seasonalEffect;
        }

        return $predictions;
    }

    protected function detectSeasonalPattern(array $series, int $period)
    {
        $n = count($series);
        if ($n < $period * 2) return array_fill(0, $period, 0);

        $pattern = array_fill(0, $period, 0);
        $cycles = floor($n / $period);

        for ($i = 0; $i < $period; $i++) {
            $sum = 0;
            for ($j = 0; $j < $cycles; $j++) {
                $index = $j * $period + $i;
                if ($index < $n) {
                    $sum += $series[$index] - ($j > 0 ? $series[$index - $period] : 0);
                }
            }
            $pattern[$i] = $sum / $cycles;
        }

        return $pattern;
    }


    protected function generatePredictionDates($lastDate, $periods, $timeRange)
    {
        $dates = [];
        $current = new \DateTime($lastDate);

        for ($i = 1; $i <= $periods; $i++) {
            if ($timeRange === 'daily') {
                $current->modify('+1 day');
            } elseif ($timeRange === 'weekly') {
                $current->modify('+1 week');
            } else {
                $current->modify('+1 month');
            }

            $dates[] = $current->format('Y-m-d');
        }

        return $dates;
    }

    protected function calculateRecommendation(array $predictions)
    {
        $average = array_sum($predictions) / count($predictions);
        $min = min($predictions);
        $max = max($predictions);

        return [
            'optimal_price' => $average * 0.9, // 10% dibawah rata-rata untuk daya saing
            'min_price' => $min,
            'max_price' => $max,
            'predicted_profit' => ($average * 0.9) - ($min * 0.8) // Contoh perhitungan keuntungan
        ];
    }

    protected function sarimaPredictWithR(
        array $series,
        int $p,
        int $d,
        int $q,
        int $P,
        int $D,
        int $Q,
        int $seasonalPeriod,
        int $periods
    ) {
        $r = new \Ktomk\Pipelines\Runner\R();

        // Siapkan data untuk R
        $data = implode(',', $series);

        // Skrip R untuk SARIMA
        $script = <<<RSCRIPT
        library(forecast)
        library(jsonlite)
        
        # Input data
        data <- c($data)
        seasonal_period <- $seasonalPeriod
        forecast_periods <- $periods
        
        # Convert to time series
        ts_data <- ts(data, frequency=seasonal_period)
        
        # Fit SARIMA model
        fit <- tryCatch({
            Arima(ts_data, order=c($p,$d,$q), seasonal=list(order=c($P,$D,$Q), period=seasonal_period))
        }, error = function(e) {
            # Fallback to auto.arima jika model spesifik error
            auto.arima(ts_data)
        })
        
        # Buat prediksi
        forecast_result <- forecast(fit, h=forecast_periods)
        
        # Hasil dalam format JSON
        result <- list(
            model = toString(fit),
            predictions = as.numeric(forecast_result$mean),
            lower = as.numeric(forecast_result$lower[2]),
            upper = as.numeric(forecast_result$upper[2]),
            accuracy = as.list(accuracy(fit))
        
        toJSON(result)
        RSCRIPT;

        $result = $r->run($script);
        $decoded = json_decode($result, true);

        // Simpan log model untuk evaluasi
        \Log::info("SARIMA Model Used: " . $decoded['model']);
        \Log::info("Model Accuracy: " . print_r($decoded['accuracy'], true));

        return [
            'predictions' => $decoded['predictions'],
            'lower' => $decoded['lower'],
            'upper' => $decoded['upper'],
            'model_info' => $decoded['model']
        ];
    }


    protected function autoSarimaPredict(array $series, int $seasonalPeriod, int $periods)
    {
        $r = new \Ktomk\Pipelines\Runner\R();

        $data = implode(',', $series);

        $script = <<<RSCRIPT
        library(forecast)
        library(jsonlite)
        
        data <- c($data)
        seasonal_period <- $seasonalPeriod
        
        ts_data <- ts(data, frequency=seasonal_period)
        fit <- auto.arima(ts_data, stepwise=FALSE, approximation=FALSE)
        
        forecast_result <- forecast(fit, h=$periods)
        
        result <- list(
            model = toString(fit),
            order = fit$arma,
            predictions = as.numeric(forecast_result$mean),
            lower = as.numeric(forecast_result$lower[2]),
            upper = as.numeric(forecast_result$upper[2]),
            accuracy = as.list(accuracy(fit)))
        
        toJSON(result)
        RSCRIPT;

        $result = $r->run($script);
        return json_decode($result, true);
    }
}
