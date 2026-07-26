<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed akun admin default.
     * Email: admin@sakadirgantara.id
     * Password: password
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'roisfrancis08@gmail.com'],
            [
                'name' => 'Administrator Saka Dirgantara',
                'password' => Hash::make('password'),
            ]
        );
    }
}
