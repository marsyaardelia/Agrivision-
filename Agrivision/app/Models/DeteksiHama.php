<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeteksiHama extends Model
{
    use HasFactory;
    protected $table = 'deteksi_hamas';
    protected $fillable = [
        'lokasi',
        'nama_tanaman',
        'jenis_hama',
        'confidence_score',
        'tingkat_kerusakan',
        'status_deteksi'
    ];
}


