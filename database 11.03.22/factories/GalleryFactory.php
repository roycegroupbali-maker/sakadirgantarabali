<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(4),
            'foto' => 'gallery/placeholder.jpg',
            'deskripsi' => fake()->sentence(12),
            'tanggal' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
