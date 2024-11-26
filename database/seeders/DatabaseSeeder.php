<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
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

        // USER
        User::factory()->create([
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'status' => 1,
            'hp' => '08123456789',
            'password' => bcrypt('P@55word'),
        ]);
        User::factory()->create([
            'nama' => 'Yuris ALkhalifi',
            'email' => 'yuris@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '08234567890',
            'password' => bcrypt('P@55word'),
        ]);

        // KATEGORI
        Kategori::create([
            'nama_kategori' => 'Monitor'
        ]);
        Kategori::create([
            'nama_kategori' => 'Keyboard'
        ]);
        Kategori::create([
            'nama_kategori' => 'Flashdisk'
        ]);
        Kategori::create([
            'nama_kategori' => 'Mouse'
        ]);
        Kategori::create([
            'nama_kategori' => 'Cooling Pad'
        ]);
    }
}
