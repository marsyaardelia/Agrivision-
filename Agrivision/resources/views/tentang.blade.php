@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h2>Tentang AgriVision Garut</h2>
    <p><strong>Tujuan Sistem:</strong> Mempercepat pencatatan dan penanganan serangan hama tanaman berbasis Computer Vision untuk Kelompok Tani Makmur.</p>

    <h4>Lokasi Deteksi:</h4>
    <ul>
        <li>Kecamatan Garut Kota</li>
        <li>Kecamatan Tarogong Kaler</li>
        <li>Kecamatan Samarang</li>
    </ul>

    <h4>Parameter Hasil Deteksi:</h4>
    <ul>
        <li>Jenis Hama</li>
        <li>Confidence Score (%)</li>
        <li>Tingkat Kerusakan Daun (%)</li>
    </ul>

    <h4>Model Klasifikasi:</h4>
    <p>EfficientNet-B0</p>
</div>
@endsection