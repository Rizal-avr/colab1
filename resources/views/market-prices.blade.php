@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Harga Pasar</h2>
    
    <form method="POST" action="{{ route('predict') }}">
        @csrf
        <div class="row mb-4">
            <div class="col-md-4">
                <label>Produk</label>
                <select name="product" class="form-control">
                    @foreach($prices->unique('product_name') as $item)
                        <option value="{{ $item->product_name }}">{{ $item->product_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label>Rentang Waktu</label>
                <select name="time_range" class="form-control">
                    <option value="daily">Harian</option>
                    <option value="weekly">Mingguan</option>
                    <option value="monthly">Bulanan</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Periode Prediksi</label>
                <select name="periods" class="form-control">
                    <option value="3">3 Periode</option>
                    <option value="6">6 Periode</option>
                    <option value="12">12 Periode</option>
                </select>
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary">Prediksi</button>
            </div>
        </div>
    </form>
    
    <div class="chart-container">
        <canvas id="priceChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('priceChart').getContext('2d');
    const prices = @json($prices->pluck('price'));
    const dates = @json($prices->pluck('date'));
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Harga Pasar',
                data: prices,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
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
@endsection