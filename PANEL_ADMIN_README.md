# Panel Admin — Saka Dirgantara Bali

Dokumen ini menjelaskan cara memasang Panel Admin yang ditambahkan ke project Laravel
`sakadirgantarabali`. **Tampilan website publik (index.blade.php) tidak diubah** —
hanya sumber data untuk Dirga News dan Galeri yang kini diambil dari database.

## 1. Salin file ke project Anda

Semua file baru/berubah ada di dalam zip ini dengan struktur folder yang sama
persis dengan repo asli. Cukup timpa (overwrite) folder project Anda dengan isi zip ini.

File yang **diubah** dari versi asli (bukan file baru):
- `config/auth.php` — ditambah guard/provider `admin`, guard `web` tidak diubah
- `bootstrap/app.php` — ditambah middleware alias `admin.guest` + redirect guest `/admin/*`
- `routes/web.php` — route `/` sekarang memakai `HomeController` (bukan closure) + require `routes/admin.php`
- `routes/admin.php` — ditambah resource route `pangkalan`
- `database/seeders/DatabaseSeeder.php` — ditambah pemanggilan `AdminSeeder` dan `PangkalanSeeder`
- `resources/views/index.blade.php` — array `NEWS`, `GALLERY`, `PANGKALAN`, dan `MEMBERS` diganti menjadi `@json(...)` dari database. Markup/HTML/CSS/JS lainnya tidak disentuh.
- `resources/css/style.css` — ditambah style untuk link "Login Admin" di footer publik.
- `app/Models/Member.php` — ditambah relasi `pangkalan`, field `pangkalan_id`/`angkatan`/`jenjang`.

## 2. Jalankan perintah berikut

```bash
composer install
composer dump-autoload
php artisan migrate
php artisan db:seed --class=Database\\Seeders\\AdminSeeder
php artisan db:seed --class=Database\\Seeders\\PangkalanSeeder
php artisan storage:link
npm install
npm run build   # atau: npm run dev
```

> Jika Anda menjalankan `php artisan migrate:fresh --seed`, `AdminSeeder` dan `PangkalanSeeder`
> akan otomatis ikut terpanggil karena sudah didaftarkan di `DatabaseSeeder`.
> `PangkalanSeeder` mengisi 10 pangkalan awal (data yang sebelumnya statis di tampilan
> publik) supaya Panel Admin tidak mulai dari kosong — boleh diedit/dihapus bebas setelahnya.

## 3. Login Admin

- URL: `/admin/login`
- Email: `admin@sakadirgantara.id`
- Password: `password`

**Segera ganti password ini setelah login pertama kali di lingkungan production.**

## 4. Struktur Panel Admin

| Fitur | URL |
|---|---|
| Login | `/admin/login` |
| Dashboard | `/admin/dashboard` |
| Dirga News | `/admin/news` |
| Galeri | `/admin/gallery` |
| Data Anggota | `/admin/members` |
| Pangkalan | `/admin/pangkalan` |

Semua route `/admin/*` (kecuali halaman login) dilindungi middleware `auth:admin`
dan otomatis redirect ke `/admin/login` jika belum login.

## 5. Catatan tentang Fitur 11 (Integrasi Publik)

- **Dirga News**: sudah terhubung ke tabel `dirga_news` (hanya berita berstatus
  `publish` yang tampil). Bila belum ada berita ter-publish, seksi "Dirga News"
  di halaman publik akan kosong — ini normal karena tampilan lama menampilkan
  data statis, sedangkan sekarang benar-benar dari database.
- **Galeri**: sudah terhubung ke tabel `galleries`. Karena skema tabel `galleries`
  (sesuai permintaan) tidak memiliki kolom kategori, sedangkan tampilan lama
  memerlukan salah satu dari 5 kategori tetap (Latihan/Perkemahan/Kunjungan/
  Bakti Sosial/Prestasi) untuk memilih ikon, kartu galeri sementara memakai
  kategori default. Foto yang diunggah tetap tersimpan dan bisa diakses via
  `foto_url`, hanya belum tampil sebagai `<img>` di kartu (kartu lama memang
  hanya menampilkan ikon, bukan foto). Jika Anda ingin kartu benar-benar
  menampilkan foto asli dan/atau kategori asli, ini perlu perubahan kecil pada
  markup galeri di `index.blade.php` — beri tahu saya jika ingin saya lanjutkan.
- **Data Anggota & Peta Sebaran**: **sudah terhubung** ke tabel `members` dan
  `pangkalans`. Field tambahan (`pangkalan_id`, `angkatan`, `jenjang`) dipilih
  lewat dropdown di form Data Anggota — nilai `angkatan`/`jenjang` memakai daftar
  tetap dari `App\Models\Member::ANGKATAN_OPTIONS` / `JENJANG_OPTIONS`. Lokasi
  pangkalan (nama, kota, titik koordinat peta) dikelola sendiri lewat menu
  **Panel Admin → Pangkalan**, lengkap dengan peta interaktif untuk memilih
  koordinat. **Catatan penting:** anggota yang belum diberi Pangkalan di form
  admin **tidak akan muncul** di halaman publik (Data Anggota maupun Peta
  Sebaran), karena tampilan lama membutuhkan lat/lng untuk setiap anggota.
  Data anggota tersebut tetap tersimpan di database dan akan otomatis muncul
  begitu Pangkalan-nya dilengkapi.

Endpoint JSON read-only lain yang tersedia (opsional, tidak wajib dipakai):
- `GET /public-data/news`
- `GET /public-data/gallery`
- `GET /public-data/members`

## 6. Validasi Upload Gambar

Semua upload (thumbnail berita, foto galeri, foto anggota) divalidasi:
- Format: jpg, jpeg, png, webp
- Ukuran maksimal: 2MB
- Disimpan di disk `public` (`storage/app/public/...`), dapat diakses via `asset('storage/...')`
  setelah `php artisan storage:link` dijalankan.
