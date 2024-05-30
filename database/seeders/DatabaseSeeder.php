<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Kategori;
use App\Models\Rekening;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt(12345)
        ]);
        Kategori::create([
            'NamaKategori' => 'Food',
            'Jenis' => 'Pengeluaran'
        ]);
        Kategori::create([
            'NamaKategori' => 'Education',
            'Jenis' => 'Pengeluaran'
        ]);
        Kategori::create([
            'NamaKategori' => 'Traffic',
            'Jenis' => 'Pengeluaran'
        ]);
        Kategori::create([
            'NamaKategori' => 'Daily',
            'Jenis' => 'Pengeluaran'
        ]);
        Kategori::create([
            'NamaKategori' => 'Family',
            'Jenis' => 'Pemasukan'
        ]);
        Kategori::create([
            'NamaKategori' => 'Wage',
            'Jenis' => 'Pemasukan'
        ]);
        Kategori::create([
            'NamaKategori' => 'Bonus',
            'Jenis' => 'Pemasukan'
        ]);
        Kategori::create([
            'NamaKategori' => 'Part Time',
            'Jenis' => 'Pemasukan'
        ]);
        Rekening::create([
            'nama_rekening' => 'BCA',
            'saldo' => 100000 ,
            'user' => 1
        ]);
        Rekening::create([
            'nama_rekening' => 'BRI',
            'saldo' => 50000 ,
            'user' => 1
        ]);
    }
}
