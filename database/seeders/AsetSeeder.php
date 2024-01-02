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
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Aset::create([
                'nomor_seri' => $faker->unique()->bothify('SERI###'),
                'foto' => $faker->imageUrl($width = 640, $height = 480), // Menggunakan Faker untuk URL gambar acak
                'nama_aset' => $faker->word,
                'jumlah' => $faker->numberBetween(1, 20),
                'lokasi_id' => $faker->optional()->randomElement(['1', '2', '3']),
                'kategori' => $faker->randomElement(['perabotan', 'elektronik', 'perlengkapan', 'transportasi']),
                'tahun' => $faker->numberBetween(2010, 2022),
                'umur' => $faker->optional()->numberBetween(1, 10),
                'harga' => $faker->optional()->numberBetween(1000000, 10000000),
                'status' => $faker->randomElement(['aktif', 'non-aktif', 'rusak', 'perbaikan', 'disewakan', 'pemindahtanganan']),
            ]);
        }
    }
}
