@extends('layouts.app')

@section( 'content')
<div class="dashboard-main-wrapper">
    <h2>Hasil Prediksi Harga</h2>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Rekomendasi Harga Jual</div>
                <div class="card-body">
                    <p>Harga Optimal: Rp {{ number_format($recommendation['optimal_price'], 2) }}</p>
                    <p>Range Harga: Rp {{ number_format($recommendation['min_price'], 2) }} - Rp {{ number_format($recommendation['max_price'], 2) }}</p>
                    <p>Prediksi Keuntungan: Rp {{ number_format($recommendation['predicted_profit'], 2) }} per unit</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="chart-container mb-4">
            <canvas id="predictionChart"></canvas>
        </div>
    </div>
    
    <h3>Data Prediksi</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Harga Prediksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($predictions as $date => $price)
            <tr>
                <td>{{ $date }}</td>
                <td>Rp {{ number_format($price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card mb-4">
    <div class="card-header">Evaluasi Model</div>
    <div class="card-body">
        @if($model_info)
            <p><strong>Model yang digunakan:</strong> {{ $model_info }}</p>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">RMSE</h5>
                        <p class="card-text">{{ number_format($model_evaluation['rmse'], 4) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">MAE</h5>
                        <p class="card-text">{{ number_format($model_evaluation['mae'], 4) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">AIC</h5>
                        <p class="card-text">{{ number_format($model_evaluation['aic'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('predictionChart').getContext('2d');
    const historical = @json($historical);
    const predictions = @json($predictions);
    
    const histDates = historical.map(item => item.date);
    const histPrices = historical.map(item => item.price);
    
    const predDates = Object.keys(predictions);
    const predPrices = Object.values(predictions);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [...histDates, ...predDates],
            datasets: [
                {
                    label: 'Data Historis',
                    data: [...histPrices, ...Array(predPrices.length).fill(null)],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                },
                {
                    label: 'Prediksi',
                    data: [...Array(histPrices.length).fill(null), ...predPrices],
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderDash: [5, 5],
                    tension: 0.1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Harga'
                    }
                }
            }
        }
    });
</script>

<div class="chart-container mb-4">
    <canvas id="predictionChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('predictionChart').getContext('2d');
    const historical = @json($historical);
    const predictions = @json($predictions['predictions'] ?? $predictions);
    const lower = @json($predictions['lower'] ?? []);
    const upper = @json($predictions['upper'] ?? []);
    
    const histDates = historical.map(item => item.date);
    const histPrices = historical.map(item => item.price);
    
    const predDates = Object.keys(predictions);
    const predPrices = Object.values(predictions);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [...histDates, ...predDates],
            datasets: [
                {
                    label: 'Data Historis',
                    data: [...histPrices, ...Array(predPrices.length).fill(null)],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1,
                    pointRadius: 2
                },
                {
                    label: 'Prediksi',
                    data: [...Array(histPrices.length).fill(null), ...predPrices],
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderDash: [5, 5],
                    tension: 0.1,
                    pointRadius: 3
                },
                {
                    label: 'Bawah (95%)',
                    data: [...Array(histPrices.length).fill(null), ...lower],
                    borderColor: 'rgb(200, 200, 200)',
                    backgroundColor: 'rgba(200, 200, 200, 0.1)',
                    borderDash: [3, 3],
                    pointRadius: 0,
                    borderWidth: 1
                },
                {
                    label: 'Atas (95%)',
                    data: [...Array(histPrices.length).fill(null), ...upper],
                    borderColor: 'rgb(200, 200, 200)',
                    backgroundColor: 'rgba(200, 200, 200, 0.1)',
                    borderDash: [3, 3],
                    pointRadius: 0,
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Prediksi Harga dengan Model SARIMA('+
                          '{{ $parameters['p'] }},{{ $parameters['d'] }},{{ $parameters['q'] }})('+
                          '{{ $parameters['P'] }},{{ $parameters['D'] }},{{ $parameters['Q'] }})['+
                          '{{ $parameters['seasonal_period'] }}]'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Harga'
                    }
                }
            }
        }
    });
</script>
@endsection