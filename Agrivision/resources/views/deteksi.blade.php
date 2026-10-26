@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card">
            <h3 class="mb-4 text-success">Input Hasil Deteksi Hama</h3>
            <form action="{{ route('deteksi.proses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Lokasi Lahan</label>
                    <select name="lokasi" class="form-select" required>
                        <option value="Garut Kota">Garut Kota</option>
                        <option value="Tarogong Kaler">Tarogong Kaler</option>
                        <option value="Samarang">Samarang</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Tanaman</label>
                    <input type="text" name="nama_tanaman" class="form-control" placeholder="Contoh: Padi, Jagung, Cabai" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Hama Hasil Prediksi</label>
                    <input type="text" name="jenis_hama" class="form-control" placeholder="Contoh: Wereng Cokelat, Ulat Grayak, Kutu Daun" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confidence Score (%)</label>
                    <input type="number" name="confidence_score" class="form-control" min="0" max="100" placeholder="0 - 100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tingkat Kerusakan Daun (%)</label>
                    <input type="number" step="0.1" name="tingkat_kerusakan" class="form-control" min="0" max="100" placeholder="0 - 100" required>
                </div>
                <button type="submit" class="btn btn-agri w-100 mt-3">Proses Hasil Deteksi</button>
            </form>
        </div>
    </div>
</div>
@endsection