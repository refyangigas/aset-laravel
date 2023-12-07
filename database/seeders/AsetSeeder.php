<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asets')->insert([
            'nomor_seri'=> 'P921092',
            'dokumentasi_aset'=>'',
            'nama_aset'=>'komputer',
            'lokasi'=>'kantor',
            'kategori'=>'elektronik',
            'tahun'=> 1992,
            'umur'=> 9,
            'harga'=> 200000,
            'status'=>'aktif',
        ]);
    }
}
