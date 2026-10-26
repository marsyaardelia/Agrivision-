@extends('layouts.main')

@section('content')
<div class="custom-card">
    <h3 class="mb-4 text-success">Riwayat Deteksi Hama</h3>
    <div class="table-responsive">
        <table class="table table-custom align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Tanaman</th>
                    <th>Jenis Hama</th>
                    <th>Confidence</th>
                    <th>Kerusakan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->nama_tanaman }}</td>
                    <td>{{ $item->jenis_hama }}</td>
                    <td>{{ $item->confidence_score }}%</td>
                    <td>{{ $item->tingkat_kerusakan }}%</td>
                    <td>
                        @if($item->status_deteksi == 'Tidak Pasti')
                            <span class="status-badge status-pasti">Tidak Pasti</span>
                        @elseif($item->status_deteksi == 'Indikasi Hama')
                            <span class="status-badge status-indikasi">Indikasi Hama</span>
                        @else
                            <span class="status-badge status-konfirmasi">Hama Terkonfirmasi</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">Belum ada data riwayat deteksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection