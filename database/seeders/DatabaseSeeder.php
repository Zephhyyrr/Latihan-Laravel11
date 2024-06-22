<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Berita;
// use App\Models\Kategori;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'name'=>'Admin',
            'email'=>'admin@example.com',
            'password'=>'1',
            'status'=>'active',
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);
        \App\Models\Prodi::create([
            'nama_prodi'=>'TRPL'
        ]);
        \App\Models\Prodi::create([
            'nama_prodi'=>'MI'
        ]);
        \App\Models\Prodi::create([
            'nama_prodi'=>'TKOM'
        ]);

        \App\Models\Kategori::create([
            'nama'=>'Politik',
        ]);
        \App\Models\Kategori::create([
            'nama'=>'Teknologi',
        ]);
        \App\Models\Kategori::create([
            'nama'=>'Bisnis',
        ]);
        \App\Models\Kategori::create([
            'nama'=>'Cuaca',
        ]);
        \App\Models\Kategori::create([
            'nama'=>'Negara',
        ]);

        Mahasiswa::factory(10)->create();
        Dosen::factory(10)->create();
        Berita::factory(50)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
