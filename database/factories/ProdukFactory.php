<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->word,
            'kategori' => fake()->word,
            'harga' => fake()->numberBetween(1000, 50000),
            'stok' => fake()->numberBetween(1, 100),
            'deskripsi' => fake()->sentence
        ];
    }
}
