<?php

namespace Database\Seeders;

use App\Models\Aset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aset::create([
            'nomor_seri' => '54321',
            'foto' => 'foto.jpg',
            'nama_aset' => 'Nama Aset 2',
            'jumlah' => 5,
            'kategori' => 'elektronik',
            'tahun' => 2023,
            'umur' => 3,
            'harga' => 8000000,
            'status' => 'non-aktif',
            'lokasi_id' => 1 // Isikan ID lokasi yang sesuai
        ]);

        Aset::create([
            'nomor_seri' => '67890',
            'foto' => 'foto.jpg',
            'nama_aset' => 'Nama Aset 3',
            'jumlah' => 8,
            'kategori' => 'perlengkapan',
            'tahun' => 2021,
            'umur' => 2,
            'harga' => 6000000,
            'status' => 'aktif',
            'lokasi_id' => 2 // Isikan ID lokasi yang sesuai
        ]);

        Aset::create([
            'nomor_seri' => '11111',
            'foto' => 'foto.jpg',
            'nama_aset' => 'Nama Aset 4',
            'jumlah' => 12,
            'kategori' => 'perabotan',
            'tahun' => 2024,
            'umur' => 1,
            'harga' => 7000000,
            'status' => 'aktif',
            'lokasi_id' => 1 // Isikan ID lokasi yang sesuai
        ]);

        Aset::create([
            'nomor_seri' => '22222',
            'foto' => 'foto.jpg',
            'nama_aset' => 'Nama Aset 5',
            'jumlah' => 7,
            'kategori' => 'transportasi',
            'tahun' => 2022,
            'umur' => 4,
            'harga' => 9000000,
            'status' => 'rusak',
            'lokasi_id' => 3 // Isikan ID lokasi yang sesuai
        ]);
    }
}
