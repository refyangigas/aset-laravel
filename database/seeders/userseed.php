<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample user
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        // Create multiple users using DB facade
        DB::table('users')->insert([
            [
                'name' => 'User Satu',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User Dua',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
            ],
            // Add more users as needed
        ]);
    }
}
