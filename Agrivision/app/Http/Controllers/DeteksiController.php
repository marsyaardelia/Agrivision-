<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeteksiHama;

class DeteksiController extends Controller
{
    public function formDeteksi()
    {
        return view('deteksi');
    }

    public function prosesData(Request $request)
    {
        $confidence = $request->input('confidence_score');

        if ($confidence < 50) {
            $status = 'Tidak Pasti';
            $rekomendasi = 'Perlu verifikasi manual oleh petugas';
        } elseif ($confidence >= 50 && $confidence <= 80) {
            $status = 'Indikasi Hama';
            $rekomendasi = 'Lakukan pemantauan intensif';
        } else {
            $status = 'Hama Terkonfirmasi';
            $rekomendasi = 'Segera lakukan pengendalian hama';
        }

        $dataDeteksi = DeteksiHama::create([
            'lokasi' => $request->lokasi,
            'nama_tanaman' => $request->nama_tanaman,
            'jenis_hama' => $request->jenis_hama,
            'confidence_score' => $confidence,
            'tingkat_kerusakan' => $request->tingkat_kerusakan,
            'status_deteksi' => $status,
        ]);

        return view('hasil', compact('dataDeteksi', 'rekomendasi'));
    }

    public function riwayat()
    {
        $riwayat = DeteksiHama::latest()->get();
        return view('riwayat', compact('riwayat'));
    }
}
