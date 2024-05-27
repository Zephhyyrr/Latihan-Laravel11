<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Mahasiswa;
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
        User::factory(10)->create();

        \App\Models\Prodi::create([
            'nama_prodi'=>'TRPL'
        ]);
        \App\Models\Prodi::create([
            'nama_prodi'=>'MI'
        ]);
        \App\Models\Prodi::create([
            'nama_prodi'=>'TKOM'
        ]);

        Mahasiswa::factory(10)->create();
        Dosen::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
