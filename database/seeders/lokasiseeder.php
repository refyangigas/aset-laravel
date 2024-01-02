<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class lokasiseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatan = [
            'Ajung',
            'Ambulu',
            'Arjasa',
            'Balung',
            'Bangsalsari',
            'Gumukmas',
            'Jelbuk',
            // Tambahkan kecamatan lainnya sesuai kebutuhan
        ];

        $faker = Faker::create('id_ID');

        foreach ($kecamatan as $nama_kecamatan) {
            Lokasi::create([
                'nama' => $nama_kecamatan,
                // Tambahkan data lainnya jika diperlukan
            ]);
        }
    }
}
