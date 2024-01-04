<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = [
            'Kencong',
            'Gumuk Mas',
            'Puger',
            'Wuluhan',
            'Ambulu',
            'Tempurejo',
            'Silo',
            'Mayang',
            'Mumbulsari',
            'Jenggawah',
            'Ajung',
            'Rambipuji',
            'Balung',
            'Umbulsari',
            'Semboro',
            'Jombang',
            'Sumberbaru',
            'Tanggul',
            'Bangsalsari',
            'Panti',
            'Sukorambi',
            'Arjasa',
            'Pakusari',
            'Kalisat',
            'Ledokombo',
            'Sumberjambe',
            'Sukowono',
            'Jelbuk',
            'Kaliwates',
            'Sumbersari',
            'Patrang',
        ];

        foreach ($kecamatan as $nama_kecamatan) {
            Lokasi::create([
                'nama' => $nama_kecamatan,
                // Tambahkan data lainnya jika diperlukan
            ]);
        }
    }
}
