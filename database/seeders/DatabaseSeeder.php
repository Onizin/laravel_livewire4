<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(100)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //kategori
        $kategoris = [
            ['nama' => 'Elektronik', 'deskripsi' => 'Produk elektronik'],
            ['nama' => 'Makanan',    'deskripsi' => 'Produk makanan'],
            ['nama' => 'Minuman',    'deskripsi' => 'Produk minuman'],
            ['nama' => 'Pakaian',    'deskripsi' => 'Produk pakaian'],
            ['nama' => 'Alat Tulis', 'deskripsi' => 'Perlengkapan alat tulis'],
        ];

        foreach ($kategoris as $item) {
            Kategori::create([
                'nama'      => $item['nama'],
                'slug'      => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
                'is_active' => true,
            ]);
        }

        // ── 3. BARANG ─────────────────────────────────────────
        Barang::factory(10)->create();
    }
}
