<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Member>
 */
class MemberFactory extends Factory
{
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $nomor = 100;

        return [
            'nama' => fake()->name(),
            'nomor_anggota' => 'SD-BA-'.(++$nomor),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTimeBetween('-20 years', '-15 years'),
            'agama' => fake()->randomElement(['Islam', 'Hindu', 'Kristen', 'Katolik', 'Buddha']),
            'alamat' => fake()->address(),
            'no_hp' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'asal_sekolah' => fake()->company().' High School',
            'krida' => fake()->randomElement(['Krida Olahraga Dirgantara', 'Krida Pengetahuan Dirgantara', 'Krida Jasa Kedirgantaraan']),
            'jabatan' => 'Anggota',
            'foto' => null,
            'status' => fake()->randomElement(['Aktif', 'Alumni', 'Non Aktif']),
        ];
    }
}
