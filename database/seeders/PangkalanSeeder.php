<?php

namespace Database\Seeders;

use App\Models\Pangkalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkalanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed 10 pangkalan awal (data yang sebelumnya statis di tampilan publik),
     * supaya Panel Admin tidak mulai dari kosong. Bisa diedit/ditambah/dihapus
     * bebas lewat Panel Admin → Pangkalan setelah ini.
     */
    public function run(): void
    {
        $pangkalanList = [
            ['nama' => 'Pangkalan SMAN 1 Denpasar', 'kota' => 'Denpasar', 'lat' => -8.6595, 'lng' => 115.2166],
            ['nama' => 'Pangkalan SMKN 3 Denpasar', 'kota' => 'Denpasar', 'lat' => -8.6803, 'lng' => 115.2321],
            ['nama' => 'Pangkalan SMAN 1 Kuta', 'kota' => 'Badung', 'lat' => -8.7181, 'lng' => 115.1690],
            ['nama' => 'Pangkalan SMAN 1 Gianyar', 'kota' => 'Gianyar', 'lat' => -8.5385, 'lng' => 115.3284],
            ['nama' => 'Pangkalan SMAN 1 Tabanan', 'kota' => 'Tabanan', 'lat' => -8.5416, 'lng' => 115.1258],
            ['nama' => 'Pangkalan SMAN 1 Semarapura', 'kota' => 'Klungkung', 'lat' => -8.5387, 'lng' => 115.4034],
            ['nama' => 'Pangkalan SMAN 1 Bangli', 'kota' => 'Bangli', 'lat' => -8.4534, 'lng' => 115.3542],
            ['nama' => 'Pangkalan SMAN 1 Amlapura', 'kota' => 'Karangasem', 'lat' => -8.4547, 'lng' => 115.6229],
            ['nama' => 'Pangkalan SMAN 1 Singaraja', 'kota' => 'Buleleng', 'lat' => -8.1120, 'lng' => 115.0882],
            ['nama' => 'Pangkalan SMAN 1 Negara', 'kota' => 'Jembrana', 'lat' => -8.3672, 'lng' => 114.6255],
        ];

        foreach ($pangkalanList as $pangkalan) {
            Pangkalan::updateOrCreate(
                ['nama' => $pangkalan['nama']],
                $pangkalan
            );
        }
    }
}
