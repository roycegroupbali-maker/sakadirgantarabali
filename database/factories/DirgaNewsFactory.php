<?php

namespace Database\Factories;

use App\Models\DirgaNews;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DirgaNews>
 */
class DirgaNewsFactory extends Factory
{
    protected $model = DirgaNews::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = fake()->sentence(6);

        return [
            'judul' => $judul,
            'slug' => DirgaNews::generateUniqueSlug($judul),
            'thumbnail' => null,
            'isi' => fake()->paragraphs(4, true),
            'penulis' => fake()->name(),
            'tanggal_publish' => fake()->dateTimeBetween('-6 months', 'now'),
            'status' => fake()->randomElement(['draft', 'publish']),
        ];
    }
}
