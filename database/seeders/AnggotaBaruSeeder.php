<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Pangkalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaBaruSeeder extends Seeder
{
    use WithoutModelEvents;

    /** Daftar 1 (pangkalan belum terdata): [nama, jenis_kelamin] */
    private array $angkatan17 = [
        ['Mardiansyah Putri', 'Perempuan'],
        ['Angelinaraa Claudia', 'Perempuan'],
        ['Ni Komang Eka Putri Yuliantari', 'Perempuan'],
        ['Ni Kadek Oriza Handriski', 'Perempuan'],
        ['Maria Auxilia Santi Santosa', 'Perempuan'],
        ['Halimah Nur Kholis', 'Perempuan'],
        ['Ni Putu Kesya Pradyani Rianti', 'Perempuan'],
        ['Riana Febriantii', 'Perempuan'],
        ['Nova Lita', 'Perempuan'],
        ['Silvinia Puspitasari', 'Perempuan'],
        ['Nataneila Cattalina Chana', 'Perempuan'],
        ['I Gusti Ayu Juni Katari Dewi', 'Perempuan'],
        ['Aulyah Nadia Fitri', 'Perempuan'],
        ['Kharista Chera Amelja', 'Perempuan'],
        ['Raden Roro Nadia Febriani Kusumaningrum', 'Perempuan'],
        ['Sultan Latif Lutfi', 'Laki-laki'],
        ['Naufal Resta Aqil Thayyar', 'Laki-laki'],
        ['Rhamaeza Soetanto', 'Laki-laki'],
        ['Christian Jori Saselah', 'Laki-laki'],
        ['Michel Septian', 'Laki-laki'],
        ['Fitroh Al Roqib', 'Laki-laki'],
        ['Sandy Purnama Fadillah Akbar', 'Laki-laki'],
        ['I Gusti Putu Bagus Krisna Putra', 'Laki-laki'],
        ['I Kadek Narendra Anantha Pramuditya', 'Laki-laki'],
        ['I Putu Mas Vasyamahista Satya Sasmita', 'Laki-laki'],
        ['I Made Nandika Candra', 'Laki-laki'],
        ['I Kadek Anom Permana', 'Laki-laki'],
        ['Kevin Reyman Luvianda Hernando', 'Laki-laki'],
        ['Kadek Krisna Riadharma', 'Laki-laki'],
    ];

    /** Daftar 2: [nama, jenis_kelamin, pangkalan] */
    private array $angkatan18 = [
        ['Luh Bintang Permata', 'Perempuan', 'SMKS Kesehatan Bali Medika Denpasar'],
        ['Anak Agung Gede Agasta Kanaka', 'Laki-laki', 'SMAS Katolik Santo Yoseph Denpasar'],
        ['Sahrela Wulan Angestu', 'Perempuan', 'SMK Bintang Persada Denpasar'],
        ['Nasila Dwi Anjani', 'Perempuan', 'SMK Bintang Persada Denpasar'],
        ['Dea Aurell Kanzania Putri', 'Perempuan', 'SMK Bintang Persada Denpasar'],
        ['Adisty Zahra Aulia Putri', 'Perempuan', 'SMK Bintang Persada Denpasar'],
        ['Gek Ayu Dian Handayani', 'Perempuan', 'SMK Penerbangan Cakra Nusantara'],
        ['Stefanus Januar Esau Nukang', 'Laki-laki', 'SMK Penerbangan Cakra Nusantara'],
        ['I Putu Junior Aryadika Pratama', 'Laki-laki', 'SMK Pratama Widya Mandala Badung'],
        ['Ni Ketut Widharti Suryapratiwi', 'Perempuan', 'SMAN 2 Kuta Utara'],
        ['I Komang Pande Daniawan', 'Laki-laki', 'SMAN 2 Kuta Utara'],
        ['I Ganti Aya Nota Suadyani', 'Perempuan', 'SMA Taruna Widhya Garuda Bali'],
        ['Komang Ardita Wijaya', 'Laki-laki', 'SMA Taruna Widhya Garuda Bali'],
        ['Rizky Fechandini', 'Perempuan', 'SMA Taruna Widhya Garuda Bali'],
        ['Anggi Widya Putri', 'Perempuan', 'SMA Taruna Widhya Garuda Bali'],
        ['Wahidatul Fauziah', 'Perempuan', 'SMA Taruna Widhya Garuda Bali'],
        ['Ni Ketut Ratna Widianti', 'Perempuan', 'SMAS Dwijendra Bualu'],
        ['Nafila Aufa Aidia Fitri', 'Perempuan', 'MA Kalifa Nusantara'],
        ['Minerva Qanita Ardanaricwari', 'Perempuan', 'MA Tawakkal Denpasar'],
        ['Kadek Dwi Juwita', 'Perempuan', 'SMK PGRI 5 Denpasar'],
        ['Ni Putu Anggi Anggreni', 'Perempuan', 'SMAN 1 Payangan'],
        ['Kadek Twino Regayasa', 'Laki-laki', 'SMKN 2 Singaraja'],
        ['Avrillia Intan Bachtiar', 'Perempuan', 'MAU Ghanira'],
        ['Kirana Nova Aulia', 'Perempuan', 'MAU Ghanira'],
        ['Safanah Purnama Putri Budi Utomo', 'Perempuan', 'MAU Ghanira'],
        ['Muhammad Ilham', 'Laki-laki', 'MAU Ghanira'],
        ['Khadijah Zahra Corazon Prayoga', 'Perempuan', 'MAU Ghanira'],
        ['Armitha Asa Yasfifa', 'Perempuan', 'MAU Ghanira'],
        ['Israil Ibrahim El', 'Laki-laki', 'MAU Ghanira'],
        ['Nawwaf Azka Adwafaza', 'Laki-laki', 'MAU Ghanira'],
        ['Rizky Adi Pratama', 'Laki-laki', 'MAU Ghanira'],
        ['Khansa Labibah Nur Fifaa', 'Perempuan', 'MAU Ghanira'],
        ['Marcelllyno Surya Darma', 'Laki-laki', 'MAU Ghanira'],
        ['Bella Putri Priangan', 'Perempuan', 'MAU Ghanira'],
        ['M. Safriansah Adi P', 'Laki-laki', 'MAU Ghanira'],
        ['Ardianta Nugroho', 'Laki-laki', 'MAU Ghanira'],
        ['Muhammad Satrio Aji Wiseso', 'Laki-laki', 'MAU Ghanira'],
        ['Silvi Anindya Mutiara Sari', 'Perempuan', 'MAU Ghanira'],
    ];

    /** Angkatan sistem untuk tiap daftar. */
    private array $angkatanLabel = [
        17 => 'Angkatan XVII (2021)',
        18 => 'Angkatan XVIII (2022)',
    ];

    /** Krida diisi bergantian (data sementara, silakan diedit di Panel Admin). */
    private array $kridaList = ['Ordirga', 'Jasa', 'Pengetahuan'];

    private int $kridaIdx = 0;

    /** Nama pangkalan di daftar => nama pangkalan yang sudah ada di database. */
    private array $pangkalanAlias = [
        'SMK Bintang Persada Denpasar' => 'SMK Bintang Persada',
        'SMAN 2 Kuta Utara' => 'SMA N 2 KUTA UTARA',
    ];

    /**
     * Lokasi pangkalan baru (kota, lat, lng) dari data resmi Kemendikdasmen (NPSN).
     * PERKIRAAN (koordinat resmi tidak tersedia): MA Kalifa Nusantara dan MAU Ghanira
     * — mohon dikoreksi lewat Panel Admin > Pangkalan.
     */
    private array $lokasi = [
        'SMKS Kesehatan Bali Medika Denpasar' => ['kota' => 'Denpasar', 'lat' => -8.628, 'lng' => 115.191],
        'SMAS Katolik Santo Yoseph Denpasar' => ['kota' => 'Denpasar', 'lat' => -8.67101, 'lng' => 115.216853],
        'SMK Penerbangan Cakra Nusantara' => ['kota' => 'Denpasar', 'lat' => -8.6804, 'lng' => 115.2262],
        'SMK Pratama Widya Mandala Badung' => ['kota' => 'Badung', 'lat' => -8.6530922, 'lng' => 115.1459786],
        'SMA Taruna Widhya Garuda Bali' => ['kota' => 'Badung', 'lat' => -8.5449, 'lng' => 115.1695],
        'SMAS Dwijendra Bualu' => ['kota' => 'Badung', 'lat' => -8.7864, 'lng' => 115.1972],
        'MA Tawakkal Denpasar' => ['kota' => 'Denpasar', 'lat' => -8.6731, 'lng' => 115.2222],
        'SMK PGRI 5 Denpasar' => ['kota' => 'Denpasar', 'lat' => -8.645, 'lng' => 115.2289],
        'SMAN 1 Payangan' => ['kota' => 'Gianyar', 'lat' => -8.3803, 'lng' => 115.2654],
        'SMKN 2 Singaraja' => ['kota' => 'Buleleng', 'lat' => -8.1282, 'lng' => 115.0851],
        'MA Kalifa Nusantara' => ['kota' => 'Denpasar', 'lat' => -8.669, 'lng' => 115.196],
        'MAU Ghanira' => ['kota' => 'Badung', 'lat' => -8.8, 'lng' => 115.165],
    ];

    /** Nama di daftar => nama anggota yang sudah ada (ejaan berbeda, orang yang sama). */
    private array $namaAlias = [
        'Ni Putu Kesya Pradyani Rianti' => 'Ni Putu Kesya Pradnyani Rianti',
        'Ni Ketut Widharti Suryapratiwi' => 'Ni Ketut Widhiarti Suryapratiwi',
    ];

    /**
     * Aman dijalankan berulang: anggota/pangkalan yang sudah ada tidak diduplikasi.
     * Nomor anggota melanjutkan urutan 3 digit yang sudah ada (001, 002, ...).
     * Catatan: jenis_kelamin diisi berdasarkan nama — mohon diverifikasi lewat Panel Admin.
     */
    public function run(): void
    {
        foreach ($this->angkatan17 as $i => [$nama, $jk]) {
            $this->simpan($nama, $jk, null, 17, $i + 1);
        }

        foreach ($this->angkatan18 as $i => [$nama, $jk, $pangkalan]) {
            $this->simpan($nama, $jk, $pangkalan, 18, $i + 1);
        }
    }

    private function nomorBerikutnya(): string
    {
        $max = Member::pluck('nomor_anggota')
            ->filter(fn ($n) => preg_match('/^\d{1,3}$/', $n))
            ->map(fn ($n) => (int) $n)
            ->max() ?? 0;

        return str_pad((string) ($max + 1), 3, '0', STR_PAD_LEFT);
    }

    private function simpan(string $nama, string $jk, ?string $pangkalan, int $angkatan, int $urut): void
    {
        $namaDb = $this->namaAlias[$nama] ?? $nama;

        $existing = Member::whereRaw('LOWER(nama) = ?', [mb_strtolower($namaDb)])->first();

        if ($existing) {
            // Anggota lama: hanya isi angkatan jika masih kosong, data lain tidak diubah.
            if (! $existing->angkatan) {
                $existing->update(['angkatan' => $this->angkatanLabel[$angkatan]]);
            }

            return;
        }

        $pangkalanId = null;

        if ($pangkalan) {
            $namaPangkalan = $this->pangkalanAlias[$pangkalan] ?? $pangkalan;
            $lokasi = $this->lokasi[$namaPangkalan] ?? [];
            $model = Pangkalan::firstOrCreate(['nama' => $namaPangkalan], $lokasi);

            if ($lokasi && $model->lat === null) {
                $model->update($lokasi);
            }

            $pangkalanId = $model->id;
        }

        Member::create([
            'nama' => $nama,
            'nomor_anggota' => $this->nomorBerikutnya(),
            'jenis_kelamin' => $jk,
            'asal_sekolah' => $pangkalan,
            'pangkalan_id' => $pangkalanId,
            'angkatan' => $this->angkatanLabel[$angkatan],
            'krida' => $this->kridaList[$this->kridaIdx++ % count($this->kridaList)],
            'jabatan' => 'Anggota',
            'status' => 'Aktif',
        ]);
    }
}