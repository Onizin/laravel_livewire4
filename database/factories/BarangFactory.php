<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kategori;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori_id' => Kategori::inRandomOrder()->first()?->id
                             ?? Kategori::factory(),
            'nama'        => fake()->words(3, true),
            'kode'        => strtoupper(fake()->unique()->bothify('BRG-####')),
            'deskripsi'   => fake()->paragraph(),
            'stok'        => fake()->numberBetween(0, 500),
            'harga'       => fake()->numberBetween(5000, 5000000),
            'satuan'      => fake()->randomElement(['pcs', 'kg', 'liter', 'box', 'lusin']),
            'foto'        => null,
            'is_active'   => true,
        ];
    }
}
