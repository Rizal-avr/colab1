<?php

namespace App\Http\Controllers;

use App\Models\MarketPrice;
use Illuminate\Http\Request;

class PricePredictionController extends Controller
{
    public function showMarketPrices()
    {
        $prices = MarketPrice::orderBy('date')->get();
        return view('market-prices', compact('prices'));
    }

    public function predict(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'time_range' => 'required|in:daily,weekly,monthly',
            'periods' => 'required|integer|min:1|max:12'
        ]);

        // Ambil data historis
        $historicalData = MarketPrice::where('product_name', $request->product)
            ->orderBy('date')
            ->get();

        if ($historicalData->isEmpty()) {
            return back()->with('error', 'Data historis tidak ditemukan');
        }

        // Proses data untuk SARIMA (contoh sederhana)
        $timeSeries = $historicalData->pluck('price')->toArray();
        $dates = $historicalData->pluck('date')->toArray();

        // Lakukan prediksi (ini adalah contoh sederhana)
        // Dalam implementasi nyata, gunakan library seperti Rubix ML atau R
        $predictions = $this->simpleSarimaPrediction($timeSeries, $request->periods);

        // Generate tanggal prediksi
        $lastDate = end($dates);
        $predictionDates = $this->generatePredictionDates($lastDate, $request->periods, $request->time_range);

        // Hitung rekomendasi harga dan prediksi keuntungan
        $recommendation = $this->calculateRecommendation($predictions);

        return view('prediction-results', [
            'historical' => $historicalData,
            'predictions' => array_combine($predictionDates, $predictions),
            'recommendation' => $recommendation,
            'timeRange' => $request->time_range
        ]);
    }

    protected function simpleSarimaPrediction(array $series, int $periods)
    {
        // Implementasi sederhana - dalam praktik gunakan library proper
        $lastValue = end($series);
        $trend = ($series[count($series) - 1] - $series[0]) / count($series);

        $predictions = [];
        for ($i = 1; $i <= $periods; $i++) {
            $predictions[] = $lastValue + ($trend * $i);
        }

        return $predictions;
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
}
