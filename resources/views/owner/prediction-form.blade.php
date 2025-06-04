@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Prediksi Harga dengan SARIMA</h2>
    
    <form method="POST" action="{{ route('predict') }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Produk</label>
                <select name="product" class="form-select" required>
                    @foreach($products as $product)
                        <option value="{{ $product }}">{{ $product }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Rentang Waktu</label>
                <select name="time_range" class="form-select" required>
                    <option value="daily">Harian</option>
                    <option value="weekly">Mingguan</option>
                    <option value="monthly">Bulanan</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Periode Prediksi</label>
                <select name="periods" class="form-select" required>
                    <option value="7">7 Hari/Minggu</option>
                    <option value="14">14 Hari/Minggu</option>
                    <option value="30">30 Hari/1 Bulan</option>
                    <option value="90">90 Hari/3 Bulan</option>
                </select>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header">Parameter SARIMA</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Non-Seasonal</h5>
                        <div class="mb-3">
                            <label class="form-label">p (AR order)</label>
                            <input type="number" name="p" class="form-control" min="0" max="5" value="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">d (Differencing order)</label>
                            <input type="number" name="d" class="form-control" min="0" max="2" value="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">q (MA order)</label>
                            <input type="number" name="q" class="form-control" min="0" max="5" value="1" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <h5>Seasonal</h5>
                        <div class="mb-3">
                            <label class="form-label">P (Seasonal AR)</label>
                            <input type="number" name="P" class="form-control" min="0" max="5" value="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">D (Seasonal Differencing)</label>
                            <input type="number" name="D" class="form-control" min="0" max="2" value="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Q (Seasonal MA)</label>
                            <input type="number" name="Q" class="form-control" min="0" max="5" value="1" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <h5>Seasonal Period</h5>
                        <div class="mb-3">
                            <label class="form-label">Panjang Siklus Musiman</label>
                            <select name="seasonal_period" class="form-select" required>
                                <option value="7">7 (Mingguan)</option>
                                <option value="30">30 (Bulanan)</option>
                                <option value="365">365 (Tahunan)</option>
                                <option value="12" selected>12 (Bulanan untuk data tahunan)</option>
                            </select>
                            <small class="text-muted">Sesuaikan dengan pola musiman data Anda</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Buat Prediksi</button>
    </form>
</div>
@endsection