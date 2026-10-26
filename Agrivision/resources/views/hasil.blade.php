@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card">
            <h3 class="mb-4 text-success">Hasil Analisis Deteksi</h3>
            <table class="table table-bordered align-middle">
                <tbody>
                    <tr><th width="35%">Lokasi Lahan</th><td>{{ $dataDeteksi->lokasi }}</td></tr>
                    <tr><th>Nama Tanaman</th><td>{{ $dataDeteksi->nama_tanaman }}</td></tr>
                    <tr><th>Jenis Hama</th><td>{{ $dataDeteksi->jenis_hama }}</td></tr>
                    <tr><th>Confidence Score</th><td>{{ $dataDeteksi->confidence_score }}%</td></tr>
                    <tr><th>Tingkat Kerusakan</th><td>{{ $dataDeteksi->tingkat_kerusakan }}%</td></tr>
                    <tr>
                        <th>Status Deteksi</th>
                        <td>
                            @if($dataDeteksi->status_deteksi == 'Tidak Pasti')
                                <span class="status-badge status-pasti">Tidak Pasti</span>
                            @elseif($dataDeteksi->status_deteksi == 'Indikasi Hama')
                                <span class="status-badge status-indikasi">Indikasi Hama</span>
                            @else
                                <span class="status-badge status-konfirmasi">Hama Terkonfirmasi</span>
                            @endif
                        </td>
                    </tr>
                    <tr><th>Rekomendasi Penanganan</th><td>{{ $rekomendasi }}</td></tr>
                </tbody>
            </table>
            <div class="mt-4">
                <a href="{{ route('deteksi.form') }}" class="btn btn-agri">Input Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection