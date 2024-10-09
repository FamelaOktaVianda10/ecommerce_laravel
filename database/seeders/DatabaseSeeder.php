<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Skripsi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678910'),
            'point' => 10000,
        ]);

        Admin::create([
            'name' => 'admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        Skripsi::create([
            'judul' => 'Penjualan Mie Pedas Level Up',
            'nama' => 'Famela Okta Vianda',
            'nim' => '6304221508',
            'angkatan' => '2022',
            'dosen_pembimbing1' => 'Fajri Profesio, M.Kom',
            'dosen_pembimbing2' => 'Muhammad Ridho Nosa, M.Kom',
        ]);
    }
}