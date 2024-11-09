<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'idkonsultasi',
        'pasien_id',
        'tanggal',
        'hasil_analisa_dokter',
        'resep_obat',
    ];

    public function pasien()
    {
        return $this->belongsTo(pasien::class);
    }
}
