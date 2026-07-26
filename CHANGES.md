# Catatan Perubahan — Update Pendaftaran, Aspirasi & Angkatan

## 1. Formulir Pendaftaran Anggota Baru ("Ayo Gabung")
- Tabel baru `registrations` + model `Registration` (kode otomatis `REG-2026-0001`).
- Field email ditambahkan ke form publik (sebelumnya tidak ada) — wajib diisi untuk kirim konfirmasi.
- Submit form kini `fetch()` ke `POST /pendaftaran` (bukan mock JS lagi).
- Setelah submit sukses: tampil kode pendaftaran + email konfirmasi otomatis terkirim
  (`App\Mail\RegistrationConfirmationMail`, view `emails/registration-confirmation.blade.php`).
- **Panel Admin baru**: menu "Pendaftaran" — lihat semua pendaftar, cari, ubah status
  (Menunggu Verifikasi / Dihubungi / Diterima / Ditolak), hapus data.

## 2. Layanan Aspirasi & Pelaporan
- Tabel baru `aspirations` + model `Aspiration` (nomor tiket otomatis `LAP-2026-0001`).
- Form publik (termasuk upload lampiran) kini submit ke `POST /aspirasi` (multipart/FormData).
- Setelah submit sukses: tampil nomor tiket asli dari database + email konfirmasi otomatis
  (`App\Mail\AspirationConfirmationMail`).
- Tab "Cek Status Laporan" kini fetch ke `GET /aspirasi/cek?query=` (nomor tiket atau email),
  menampilkan riwayat/timeline asli dari database.
- Tab "Panel Admin" (demo, password `admin`) **dihapus** — diganti tombol menuju Panel Admin
  resmi (`/admin/login`) yang sudah pakai autentikasi sungguhan.
- **Panel Admin baru**: menu "Aspirasi & Laporan" — daftar + filter kategori/status, halaman
  detail dengan timeline riwayat, form ubah status (menambah entri riwayat otomatis), hapus data.

## 3. Data Anggota — Field "Angkatan"
- Sebelumnya dropdown pilihan tetap (`Member::ANGKATAN_OPTIONS`, tidak bisa nambah nilai baru).
- Sekarang **input teks bebas** (dengan datalist saran dari daftar lama untuk kemudahan
  pengetikan) — admin bebas menambah/mengedit angkatan baru tanpa dibatasi pilihan.

## Perlu dijalankan setelah deploy
```bash
php artisan migrate
php artisan storage:link   # jika belum, agar lampiran laporan bisa diakses publik
```

## Catatan konfigurasi email
Mailer default `MAIL_MAILER=log` (email masuk ke `storage/logs/laravel.log`, tidak benar-benar
terkirim). Untuk mengirim email sungguhan, set kredensial SMTP di `.env` (`MAIL_MAILER=smtp`,
`MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`, dst). Pengiriman email dibungkus try/catch —
jika gagal kirim, pendaftaran/laporan tetap tersimpan (tidak menggagalkan proses submit).
