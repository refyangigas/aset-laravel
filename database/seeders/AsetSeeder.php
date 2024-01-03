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
            $fotoName = 'aset_'.$index.'.jpg'; // Buat nama file gambar yang unik

            // Simpan gambar secara lokal di folder 'public/fotoaset/'
            $fotoPath = public_path('fotoaset/'.$fotoName);
            copy($faker->imageUrl($width = 640, $height = 480), $fotoPath);

            Aset::create([
                'nomor_seri' => $faker->unique()->bothify('SERI###'),
                'foto' => $fotoName, // Simpan nama file gambar ke dalam database
                'nama_aset' => $faker->word,
                'jumlah' => $faker->numberBetween(1, 20),
                'lokasi_id' => $faker->randomElement(['1', '2', '3']), // Memastikan lokasi_id selalu terisi
                'kategori' => $faker->randomElement(['perabotan', 'elektronik', 'perlengkapan', 'transportasi']),
                'tahun' => $faker->numberBetween(2010, 2022),
                'umur' => $faker->numberBetween(1, 10), // Memastikan umur selalu terisi
                'harga' => $faker->numberBetween(1000000, 10000000), // Memastikan harga selalu terisi
                'status' => $faker->randomElement(['aktif', 'non-aktif', 'rusak', 'perbaikan', 'disewakan', 'pemindahtanganan']),
            ]);
        }
    }
}
