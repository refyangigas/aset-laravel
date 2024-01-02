<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_seri',
        'foto',
        'nama_aset',
        'jumlah',
        'lokasi',
        'kategori',
        'tahun',
        'umur',
        'harga',
        'status',
    ];
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
