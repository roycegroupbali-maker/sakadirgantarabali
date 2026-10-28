<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title>Saka Dirgantara — Kwartir Daerah Bali</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/css/accessibility-widget.css', 'resources/js/accessibility.js']); ?>
</head>
<body>

<?php echo $__env->make('partials.accessibility-widget', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<header>
  <nav class="wrap">
    <div class="brand">
    <img src="<?php echo e(asset('img/logo saka.png')); ?>" alt="Logo Saka" class="brand-mark">
      <div class="brand-text">
        <b>SAKA DIRGANTARA</b>
        <span>Daerah Bali</span>
      </div>
    </div>
    <div class="navlinks" id="navlinks">
      <button data-page="beranda" class="active">Beranda</button>
      <button data-page="news">Dirga News</button>
      <button data-page="galeri">Galeri</button>
      <button data-page="anggota">Data Anggota</button>
      <button data-page="peta">Peta Sebaran</button>
      <button data-page="layanan">Layanan Aspirasi</button>
      <button data-page="kontak">Kontak</button>
      <button data-page="gabung" class="cta-join">Ayo Gabung →</button>
    </div>
    <button class="navburger" id="navburger">☰</button>
  </nav>
</header>

<!-- ===================== BERANDA ===================== -->
<div class="page active" id="page-beranda">

  <section class="hero">
    <div class="hero-grid"></div>
    <div class="wrap">
      <div class="eyebrow">Satuan Karya Pramuka Dirgantara Lanud I Gusti Ngurah Rai Bali</div>
      <h1>Membina Generasi Muda untuk <em>Angkasa Indonesia</em></h1>
      <p class="lead">Saka Dirgantara merupakan wadah pendidikan bagi anggota Gerakan Pramuka untuk menyalurkan minat, mengembangkan pengetahuan, keterampilan, kecakapan, pengalaman, dan kepemimpinan di bidang kedirgantaraan. Melalui pembinaan bersama TNI Angkatan Udara dan dukungan berbagai mitra di bidang penerbangan, Saka Dirgantara membentuk generasi muda yang disiplin, berkarakter, serta memiliki wawasan kebangsaan dan semangat pengabdian kepada masyarakat.</p>
      <div class="btnrow">
        <button class="btn gold" onclick="goPage('gabung')">Ayo Gabung Sekarang</button>
        <button class="btn ghost" onclick="goPage('galeri')">Lihat Galeri</button>
      </div>
      <div class="motto-strip">
        <span class="mstar">✦</span>
        <b>"Satyaku Kudarmakan, Darmaku Kubaktikan."</b>
        <span>AIRSCOUT INDONESIA</span>
      </div>
    </div>
  </section>

  <section class="stats">
    <div class="wrap">
      <div class="stat"><b id="stat-total">–</b><span>Total Anggota</span></div>
      <div class="stat"><b id="stat-aktif">–</b><span>Anggota Aktif</span></div>
      <div class="stat"><b id="stat-pangkalan">–</b><span>Pangkalan</span></div>
      <div class="stat"><b>3</b><span>Krida Pembinaan</span></div>
    </div>
  </section>

  <!-- TENTANG -->
  <section class="block">
    <div class="wrap">
      <div class="about-wrap">
        <div>
          <span class="tag">Tentang Kami</span>
          <h2 style="font-family:var(--display);font-size:28px;margin-bottom:20px;">
        Wadah Pendidikan Kedirgantaraan bagi Pramuka Penegak dan Pandega
          </h2>

          <p>
           Saka Dirgantara merupakan Satuan Karya Pramuka yang menjadi wadah pendidikan guna
         menyalurkan minat serta mengembangkan bakat, kemampuan, pengalaman,
          pengetahuan, dan keterampilan anggota Gerakan Pramuka Penegak dan Pandega
           di bidang kedirgantaraan. Melalui berbagai kegiatan yang terarah, anggota
          dibina agar memiliki kecakapan, disiplin, jiwa kepemimpinan, rasa tanggung
             jawab, serta semangat pengabdian kepada masyarakat, bangsa, dan negara.
         </p>

          <p>
        Penyelenggaraan pembinaan Saka Dirgantara dilaksanakan oleh Gerakan Pramuka
        bersama instansi pembina di bidang kedirgantaraan, terutama Tentara Nasional
        Indonesia Angkatan Udara (TNI AU), serta didukung oleh kementerian dan
        lembaga pemerintah, badan usaha milik negara (BUMN), perguruan tinggi,
        organisasi profesi, industri, maupun komunitas yang bergerak di bidang
        penerbangan dan kedirgantaraan. Melalui pendidikan kepramukaan yang dipadukan
        dengan pengetahuan dan keterampilan kedirgantaraan, Saka Dirgantara bertujuan
        membentuk generasi muda yang beriman dan bertakwa kepada Tuhan Yang Maha Esa,
        berkarakter, disiplin, berwawasan kebangsaan, serta mampu mengabdikan ilmu dan
        keterampilannya bagi kepentingan masyarakat, bangsa, dan negara.
         </p>
        </div>
        <div class="motto-card">
          <span class="tag">Semboyan</span>
          <div class="motto-text">"Satyaku Kudarmakan,<br>Darmaku Kubaktikan."</div>
          <div class="motto-desc">Janji pengabdian anggota Gerakan Pramuka untuk mengamalkan Satya dan Darma Pramuka dalam kehidupan sehari-hari, khususnya melalui pengabdian di bidang kedirgantaraan.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- TUJUAN -->
  <section class="block">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Tujuan</span>
          <h2>Tujuan Saka Dirgantara</h2>
        </div>
        <p>Lima arah pembinaan yang menjadi dasar setiap kegiatan di seluruh pangkalan.</p>
      </div>
      <div class="tujuan-list" id="tujuan-list"></div>
    </div>
  </section>

  <!-- BIDANG PEMBINAAN -->
  <section class="block">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Bidang Pembinaan</span>
          <h2>Cakupan Materi Pembinaan</h2>
        </div>
        <p>Sembilan bidang yang dipelajari anggota secara bertahap sesuai jenjang SKK.</p>
      </div>
      <div class="bidang-grid" id="bidang-grid"></div>
    </div>
  </section>

  <!-- KRIDA -->
  <section class="block">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Krida</span>
          <h2>Tiga Krida Saka Dirgantara</h2>
        </div>
        <p>Berdasarkan Petunjuk Penyelenggaraan Saka Dirgantara yang berlaku, pembinaan terbagi ke dalam tiga krida.</p>
      </div>
      <div class="krida-grid" id="krida-grid"></div>
    </div>
  </section>

  <!-- KEGIATAN -->
  <section class="block">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Kegiatan</span>
          <h2>Kegiatan Unggulan</h2>
        </div>
        <p>Sebagian kegiatan rutin dan berkala yang dilaksanakan di tingkat pangkalan maupun daerah.</p>
      </div>
      <div class="kegiatan-grid" id="kegiatan-grid"></div>
    </div>
  </section>

<!-- STRUKTUR ORGANISASI -->
<section class="block">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="tag">Struktur Organisasi</span>
        <h2>Struktur Pembinaan Saka Dirgantara</h2>
      </div>
      <p>Struktur organisasi Saka Dirgantara terdiri atas unsur pembinaan, pengelolaan, dan peserta didik yang saling mendukung dalam penyelenggaraan pendidikan kepramukaan di bidang kedirgantaraan.</p>
    </div>

    <div class="org-chart">
      <div class="org-tier">
        <div class="org-node top">Majelis Pembimbing Saka (Mabi Saka)</div>
      </div>

      <div class="org-connector"></div>

      <div class="org-tier">
        <div class="org-node">Pimpinan Saka</div>
      </div>

      <div class="org-connector"></div>

      <div class="org-tier">
        <div class="org-node">Pamong Saka</div>
        <div class="org-node">Instruktur Saka</div>
      </div>

      <div class="org-connector"></div>

      <div class="org-tier">
        <div class="org-node">Dewan Saka</div>
      </div>

      <div class="org-connector"></div>

      <div class="org-tier">
        <div class="org-node">Anggota Saka</div>
      </div>
    </div>
  </div>
</section>

  <!-- SUSUNAN DEWAN SAKA -->
  <section class="block">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Kepengurusan</span>
          <h2>Susunan Dewan Saka</h2>
        </div>
        <p>Pengurus harian dan koordinator krida yang menjalankan roda organisasi sehari-hari.</p>
      </div>
      <div class="dewan-intro">
        <span>DEWAN SAKA DIRGANTARA · LANUD I GUSTI NGURAH RAI</span>
        <h3>Masa Bakti 2026–2028</h3>
      </div>
      <div class="dewan-table" id="dewan-table"></div>
    </div>
  </section>

  <!-- MITRA -->
  <section class="block" style="border-bottom:none;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Kerja Sama</span>
          <h2>Mitra Pembinaan</h2>
        </div>
        <p>Pembinaan dilaksanakan bersama instansi dan lembaga di bidang kedirgantaraan.</p>
      </div>
      <div class="mitra-strip">
        <div class="mitra-item"><div class="mlabel">Mitra Utama</div><b>TNI Angkatan Udara</b></div>
        <div class="mitra-item"><div class="mlabel">Pemerintah</div><b>Instansi Perhubungan Udara</b></div>
        <div class="mitra-item"><div class="mlabel">BUMN</div><b>Industri &amp; Layanan Dirgantara</b></div>
        <div class="mitra-item"><div class="mlabel">Akademik</div><b>Perguruan Tinggi Penerbangan</b></div>
        <div class="mitra-item"><div class="mlabel">Komunitas</div><b>Komunitas Aviasi &amp; Antariksa</b></div>
      </div>
    </div>
  </section>

  <section class="cta-band">
    <div class="wrap">
      <h2>Jelajahi Sebaran Anggota di Seluruh Bali</h2>
      <p>Lihat data anggota per pangkalan dan lokasinya di peta interaktif, ikuti kabar terbaru melalui Dirga News, atau langsung bergabung menjadi anggota.</p>
      <div class="btnrow" style="justify-content:center;margin-bottom:0;">
        <button class="btn" onclick="goPage('peta')">Buka Peta Sebaran</button>
        <button class="btn ghost" onclick="goPage('galeri')">Lihat Galeri</button>
        <button class="btn gold" onclick="goPage('gabung')">Ayo Gabung Sekarang</button>
      </div>
    </div>
  </section>
</div>

<!-- ===================== DIRGA NEWS ===================== -->
<div class="page" id="page-news">
  <section class="block" style="padding-top:56px;border-bottom:none;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Dirga News</span>
          <h2>Kabar &amp; Kegiatan Saka Dirgantara Bali</h2>
        </div>
        <p>Liputan latihan gabungan, prestasi anggota, dan agenda kedirgantaraan dari seluruh pangkalan.</p>
      </div>
      <div class="news-grid" id="news-grid"></div>
    </div>
  </section>
</div>

<div class="modal-bg" id="news-modal">
  <div class="modal article-modal">
    <button class="modal-close" onclick="closeModal()">✕</button>
    <div class="article-hero" id="modal-hero"></div>
    <div class="article-body">
      <div class="article-meta">
        <span class="news-cat" style="position:static;display:inline-block;" id="modal-cat"></span>
        <span class="news-date" id="modal-date"></span>
        <span class="article-author" id="modal-author"></span>
      </div>
      <h2 id="modal-title"></h2>
      <div id="modal-content" class="article-content"></div>
    </div>
  </div>
</div>

<!-- ===================== GALERI ===================== -->
<div class="page" id="page-galeri">
  <section class="block" style="padding-top:56px;border-bottom:none;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Galeri</span>
          <h2>Dokumentasi Kegiatan Saka Dirgantara</h2>
        </div>
        <p>Momen latihan, perkemahan, dan kegiatan bakti dari seluruh pangkalan se-Bali.</p>
      </div>
      <div class="gallery-filter" id="gallery-filter"></div>
      <div class="gallery-grid" id="gallery-grid"></div>
    </div>
  </section>
</div>

<div class="modal-bg" id="gallery-modal">
  <div class="modal" style="max-width:560px;">
    <button class="modal-close" onclick="closeGalleryModal()">✕</button>
    <span class="news-cat" style="position:static;display:inline-block;" id="gmodal-cat"></span>
    <h2 id="gmodal-title"></h2>
    <p id="gmodal-desc"></p>
  </div>
</div>

<!-- ===================== DATA ANGGOTA ===================== -->
<div class="page" id="page-anggota">
  <section class="block" style="padding-top:56px;border-bottom:none;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Basis Data</span>
          <h2>Data Anggota</h2>
        </div>
        <p>Cari berdasarkan nama, angkatan, pangkalan, krida, sertifikasi, jabatan, atau status keaktifan.</p>
      </div>

      <div class="search-panel">
        <div class="search-row">
          <input type="text" id="search-input" placeholder="Cari nama, angkatan, pangkalan, sertifikasi, jabatan…">
        </div>
        <div class="filter-row">
          <select id="filter-status">
            <option value="">Semua Status</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
          <select id="filter-angkatan"><option value="">Semua Angkatan</option></select>
          <select id="filter-pangkalan"><option value="">Semua Pangkalan</option></select>
          <select id="filter-krida"><option value="">Semua Krida</option></select>
        </div>
      </div>

      <div class="result-count" id="result-count"></div>
      <div class="member-grid" id="member-grid"></div>
    </div>
  </section>
</div>

<!-- ===================== PETA SEBARAN ===================== -->
<div class="page" id="page-peta">
  <section class="block" style="padding-top:56px;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Peta Sebaran</span>
          <h2>Persebaran Anggota di Pulau Bali</h2>
        </div>
        <p>Klik penanda atau daftar pangkalan untuk melihat jumlah dan daftar anggota di lokasi tersebut.</p>
      </div>
      <div class="map-layout">
        <div class="map-sidebar">
          <div class="map-sidebar-head">10 Pangkalan</div>
          <div id="pangkalan-list"></div>
        </div>
        <div id="map"></div>
      </div>
    </div>
  </section>
</div>

<!-- ===================== LAYANAN ASPIRASI & PELAPORAN ===================== -->
<div class="page" id="page-layanan">
  <section class="block" style="padding-top:56px;border-bottom:none;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Layanan Publik</span>
          <h2>Layanan Aspirasi &amp; Pelaporan Masyarakat</h2>
        </div>
        <p>Sampaikan laporan, aspirasi, atau permohonan yang berkaitan dengan kegiatan pengabdian masyarakat Saka Dirgantara di bidang kedirgantaraan.</p>
      </div>

      <div class="lap-notice">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 9v4M12 16.5h.01M10.3 3.9 2.6 17.5a1.8 1.8 0 0 0 1.6 2.7h15.6a1.8 1.8 0 0 0 1.6-2.7L13.7 3.9a1.8 1.8 0 0 0-3.4 0Z"/></svg>
        <p><b>Pemberitahuan:</b> Seluruh laporan akan diverifikasi terlebih dahulu oleh Admin Saka Dirgantara sebelum diteruskan kepada Pamong Saka, Dewan Saka, atau instansi terkait apabila diperlukan. Website ini <b>bukan layanan darurat</b> maupun pengganti layanan resmi TNI AU, AirNav Indonesia, maskapai penerbangan, atau pengelola bandara. Untuk situasi darurat penerbangan, segera hubungi pihak berwenang setempat.</p>
      </div>

      <div class="lap-tabs">
        <button class="lap-tab active" data-tab="ajukan">Ajukan Laporan</button>
        <button class="lap-tab" data-tab="cek">Cek Status Laporan</button>
        <button class="lap-tab" data-tab="admin">Panel Admin</button>
      </div>

      <!-- TAB: AJUKAN LAPORAN -->
      <div class="lap-panel active" id="lap-tab-ajukan">
        <div class="lap-cat-grid" id="lap-cat-grid"></div>

        <div class="lap-form-wrap">
          <form id="lap-form">
            <div class="lap-form-section">
              <h5>Informasi Pelapor / Permohonan edukasi</h5>
              <div class="lap-form-row">
                <div class="lap-field"><label>Nama Lengkap <span class="req">*</span></label><input type="text" id="lap-nama" required placeholder="Nama sesuai identitas"></div>
                <div class="lap-field"><label>Email <span class="req">*</span></label><input type="email" id="lap-email" required placeholder="nama@email.com"></div>
              </div>
              <div class="lap-form-row triple">
                <div class="lap-field"><label>Nomor WhatsApp <span class="req">*</span></label><input type="tel" id="lap-wa" required placeholder="08xxxxxxxxxx"></div>
                <div class="lap-field"><label>Instansi / Sekolah</label><input type="text" id="lap-instansi" placeholder="Opsional"></div>
                <div class="lap-field"><label>Kota / Kabupaten <span class="req">*</span></label><input type="text" id="lap-kota" required placeholder="Contoh: Denpasar"></div>
              </div>
            </div>

            <div class="lap-form-section">
              <h5>Detail Laporan / Permohonan edukasi</h5>
              <div class="lap-form-row">
                <div class="lap-field">
                  <label>Kategori <span class="req">*</span></label>
                  <select id="lap-kategori" required></select>
                </div>
                <div class="lap-field"><label>Judul Laporan <span class="req">*</span></label><input type="text" id="lap-judul" required placeholder="Ringkasan singkat laporan"></div>
              </div>
              <div class="lap-form-row single">
                <div class="lap-field"><label>Deskripsi Lengkap <span class="req">*</span></label><textarea id="lap-deskripsi" required placeholder="Jelaskan kronologi dan detail laporan Anda"></textarea></div>
              </div>
              <div class="lap-form-row triple">
                <div class="lap-field"><label>Lokasi Kejadian <span class="req">*</span></label><input type="text" id="lap-lokasi" required placeholder="Contoh: Sekitar Bandara Ngurah Rai"></div>
                <div class="lap-field"><label>Tanggal Kejadian <span class="req">*</span></label><input type="date" id="lap-tanggal" required></div>
                <div class="lap-field"><label>Jam Kejadian</label><input type="time" id="lap-jam"></div>
              </div>
            </div>

            <div class="lap-form-section">
              <h5>Upload Bukti / permohonan</h5>
              <div class="lap-form-row single">
                <div class="lap-field">
                  <label>File Pendukung</label>
                  <input type="file" id="lap-file" accept=".jpg,.jpeg,.png,.pdf,.mp4" multiple>
                  <div class="lap-hint">Format didukung: JPG, PNG, PDF, MP4 · Maksimal 10 MB per file</div>
                </div>
              </div>
            </div>

            <div class="lap-form-section">
              <h5>Tingkat Kerahasiaan</h5>
              <div class="lap-radio-group">
                <div class="lap-radio-opt">
                  <input type="radio" name="lap-rahasia" id="lap-r-publik" value="Publik" checked>
                  <label for="lap-r-publik"><b>Publik</b>Dapat ditampilkan sebagai statistik umum</label>
                </div>
                <div class="lap-radio-opt">
                  <input type="radio" name="lap-rahasia" id="lap-r-rahasia" value="Rahasia">
                  <label for="lap-r-rahasia"><b>Rahasia</b>Identitas hanya diketahui admin &amp; pihak terkait</label>
                </div>
                <div class="lap-radio-opt">
                  <input type="radio" name="lap-rahasia" id="lap-r-anonim" value="Anonim">
                  <label for="lap-r-anonim"><b>Anonim</b>Identitas disamarkan sepenuhnya</label>
                </div>
              </div>
            </div>

            <div class="lap-consent">
              <input type="checkbox" id="lap-consent" required>
              <label for="lap-consent">Saya menyatakan bahwa informasi yang saya berikan benar dan dapat dipertanggungjawabkan.</label>
            </div>

            <div class="lap-captcha">
              <input type="checkbox" id="lap-captcha" required>
              <label for="lap-captcha">Saya bukan robot (verifikasi keamanan)</label>
            </div>

            <button type="submit" class="btn gold">Kirim Laporan</button>
          </form>

          <div class="lap-success" id="lap-success">
            <div class="check-big">✓</div>
            <h3 style="font-family:var(--display);font-size:19px;">Laporan Berhasil Dikirim</h3>
            <p style="color:var(--text-muted);margin-top:8px;">Simpan nomor tiket berikut untuk memeriksa status laporan Anda:</p>
            <div class="lap-id" id="lap-success-id"></div>
            <p style="color:var(--text-muted);margin-top:8px;font-size:12.5px;">Konfirmasi beserta nomor tiket ini juga telah dikirim ke email yang Anda daftarkan.</p>
            <div><button class="btn ghost" onclick="lapResetForm()">Ajukan Laporan Lain</button></div>
          </div>
        </div>
      </div>

      <!-- TAB: CEK STATUS -->
      <div class="lap-panel" id="lap-tab-cek">
        <div class="lap-check-box">
          <div class="lap-field" style="margin-bottom:16px;"><label>Nomor Tiket atau Email Pelapor</label></div>
          <div class="lap-check-row">
            <input type="text" id="lap-check-input" placeholder="Contoh: LAP-2026-0001">
            <button class="btn" onclick="lapCheckStatus()">Cari</button>
          </div>
        </div>
        <div id="lap-check-result"></div>
      </div>

      <!-- TAB: ADMIN -->
      <div class="lap-panel" id="lap-tab-admin">
        <div class="lap-admin-gate">
          <span class="tag" style="justify-content:center;">Akses Terbatas</span>
          <h3 style="font-family:var(--display);font-size:18px;">Panel Admin Resmi</h3>
          <p style="font-size:12.5px;color:var(--text-dim);">Pengelolaan laporan aspirasi &amp; pelaporan masyarakat kini dilakukan melalui Panel Admin resmi Saka Dirgantara Bali dengan autentikasi sungguhan, bukan lagi kode akses demo di halaman publik ini.</p>
          <a href="<?php echo e(route('admin.login')); ?>" class="btn gold" style="width:100%;display:inline-block;text-align:center;box-sizing:border-box;">Masuk ke Panel Admin</a>
        </div>
      </div>

    </div>
  </section>
</div>

<!-- ===================== AYO GABUNG ===================== -->
<div class="page" id="page-gabung">
  <section class="join-hero">
    <div class="hero-grid"></div>
    <div class="wrap">
      <div class="eyebrow">Pendaftaran Anggota Baru</div>
      <h1>Ayo Gabung Bersama <em>Saka Dirgantara</em></h1>
      <p class="lead">Wujudkan minatmu di dunia penerbangan dan antariksa. Terbuka bagi Pramuka Penegak dan Pandega dari seluruh kabupaten/kota di Bali.</p>
      <div class="btnrow" style="justify-content:center;">
        <a href="#join-form" class="btn gold" style="display:inline-block;">Daftar Sekarang</a>
        <button class="btn ghost" onclick="goPage('anggota')">Lihat Anggota Terdaftar</button>
      </div>
    </div>
  </section>

  <section class="block tight" style="border-bottom:none;">
    <div class="wrap">
      <div class="join-steps">
        <div class="join-step"><div class="jnum">01</div><h4>Isi Formulir</h4><p>Lengkapi data diri singkat pada formulir pendaftaran di bawah.</p></div>
        <div class="join-step"><div class="jnum">02</div><h4>Verifikasi Gudep</h4><p>Pengurus menghubungi melalui gugus depan/sekolah untuk konfirmasi data.</p></div>
        <div class="join-step"><div class="jnum">03</div><h4>Orientasi Anggota</h4><p>Mengikuti sesi pengenalan Saka Dirgantara dan pemilihan krida.</p></div>
        <div class="join-step"><div class="jnum">04</div><h4>Aktif Berlatih</h4><p>Resmi tergabung dan mengikuti latihan rutin setiap Sabtu.</p></div>
      </div>
    </div>
  </section>

  <section class="block" id="join-form">
    <div class="wrap">
      <div class="join-grid">
        <div class="join-panel">
          <span class="tag">Syarat Pendaftaran</span>
          <h2 style="font-family:var(--display);font-size:22px;margin-bottom:18px;">Siapa yang Bisa Bergabung?</h2>
          <ul class="req-list">
            <li><span class="check">✓</span> Anggota Gerakan Pramuka aktif berstatus Penegak atau Pandega.</li>
            <li><span class="check">✓</span> Mendapat izin/rekomendasi dari Gugus Depan (Gudep) asal sekolah.</li>
            <li><span class="check">✓</span> Sehat jasmani dan rohani, serta bersedia mengikuti latihan rutin.</li>
            <li><span class="check">✓</span> Memiliki minat di bidang penerbangan, antariksa, atau kedirgantaraan.</li>
            <li><span class="check">✓</span> Bersedia mematuhi Satya dan Darma Pramuka serta tata tertib Saka.</li>
          </ul>
          <div class="join-note">Latihan rutin dilaksanakan setiap Sabtu, 14.00–17.00 WITA, di masing-masing pangkalan terdekat.</div>
        </div>
        <div class="join-panel">
          <span class="tag">Formulir Pendaftaran</span>
          <h2 style="font-family:var(--display);font-size:22px;margin-bottom:6px;">Daftar Sebagai Calon Anggota</h2>
          <p style="font-size:12.5px;color:var(--text-dim);margin-bottom:0;">Formulir contoh — tuliskan nama pangkalan/asal sekolahmu, data akan diteruskan ke sana.</p>
          <form class="jform" id="join-form-el">
            <div>
              <label>Nama Lengkap</label>
              <input type="text" id="join-nama" required placeholder="Nama sesuai identitas">
            </div>
            <div>
              <label>Email</label>
              <input type="email" id="join-email" required placeholder="nama@email.com">
            </div>
            <div>
              <label>Pangkalan / Asal Sekolah</label>
              <input type="text" id="join-pangkalan" required list="join-pangkalan-list" placeholder="Contoh: Pangkalan SMAN 1 Denpasar">
              <datalist id="join-pangkalan-list"></datalist>
            </div>
            <div>
              <label>Minat Krida</label>
              <select id="join-krida" required></select>
            </div>
            <div>
              <label>Nomor WhatsApp</label>
              <input type="tel" id="join-wa" required placeholder="08xxxxxxxxxx">
            </div>
            <button type="submit" class="btn gold" style="margin-top:6px;">Kirim Pendaftaran</button>
          </form>
          <div class="join-success" id="join-success">
            <div class="check-big">✓</div>
            <p style="text-align:center;color:var(--text);font-family:var(--display);font-size:15px;margin-bottom:6px;">Pendaftaran Terkirim!</p>
            <div class="lap-id" id="join-success-kode" style="margin:0 auto 12px;"></div>
            <p style="text-align:center;" id="join-success-text">Pengurus pangkalan akan menghubungi kamu melalui WhatsApp untuk proses selanjutnya. Selamat datang calon anggota Saka Dirgantara!</p>
            <div style="text-align:center;"><button class="btn ghost" onclick="joinResetForm()" style="margin-top:6px;">Daftar Lagi</button></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- ===================== KONTAK ===================== -->
<div class="page" id="page-kontak">
  <section class="block" style="padding-top:56px;border-bottom:none;">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <span class="tag">Kontak</span>
          <h2>Hubungi Saka Dirgantara Bali</h2>
        </div>
      </div>
      <div class="about-grid">
        <div>
          <p>Saka Dirgantara Kwartir Daerah Bali aktif di sepuluh pangkalan yang tersebar dari Jembrana hingga Karangasem, menjangkau anggota dari seluruh kabupaten dan kota di Bali.</p>
          <p>Untuk informasi pendaftaran, jadwal latihan, atau kerja sama kegiatan, silakan hubungi sekretariat melalui kontak di samping — atau langsung isi formulir pada halaman Ayo Gabung.</p>
          <button class="btn gold" onclick="goPage('gabung')" style="margin-top:6px;">Ayo Gabung Sekarang</button>
        </div>
        <ul class="info-list">
          <li><b>Sekretariat</b><span>Markas komandon TNI AU I Gusti Ngurah Rai Bali, badung</span></li>
          <li><b>Pamong Saka</b><span>Kak Yoni Ambarwati</span></li>
          <li><b>Kontak</b><span>sk.dirgantara.bali@gmail.com</span></li>
          <li><b>Media Sosial</b><span>@sakadirgantarabali (contoh)</span></li>
          <li><b>Jam Latihan</b><span>Setiap Sabtu, 14.00–17.00 WITA, di mako tni au lanud i gusti ngurah rai bali<i/span></li>
        </ul>
      </div>
    </div>
  </section>
</div>

<footer>
  <div class="footer-top">
    <div class="wrap">
      <div class="footer-grid">

        <div class="footer-brand">
          <div class="brand">
            <img src="<?php echo e(asset('img/logo saka.png')); ?>" alt="Logo Saka" class="brand-mark">
            <div class="brand-text">
              <b>SAKA DIRGANTARA</b>
              <span>Kwartir Daerah Bali</span>
            </div>
          </div>
          <p>Wadah pendidikan dan pembinaan kedirgantaraan bagi Pramuka Penegak dan Pandega, Melalui pembinaan bersama TNI Angkatan Udara dan dukungan berbagai mitra di bidang penerbangan.</p>
          <div class="footer-social">
            <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1"/></svg></a>
            <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="2.5" y="5.5" width="19" height="13" rx="3"/><path d="M10 9.5 L15 12 L10 14.5 Z"/></svg></a>
            <a href="#" aria-label="WhatsApp"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 20l1.4-4.2A8 8 0 1 1 8.2 18.6Z"/></svg></a>
          </div>
        </div>

        <div class="footer-col">
          <h5>Navigasi</h5>
          <ul>
            <li><button onclick="goPage('beranda')">Beranda</button></li>
            <li><button onclick="goPage('news')">Dirga News</button></li>
            <li><button onclick="goPage('galeri')">Galeri</button></li>
            <li><button onclick="goPage('anggota')">Data Anggota</button></li>
            <li><button onclick="goPage('peta')">Peta Sebaran</button></li>
          </ul>
        </div>

        <div class="footer-col">
          <h5>Organisasi</h5>
          <ul>
            <li><button onclick="goPage('gabung')">Ayo Gabung</button></li>
            <li><button onclick="goPage('kontak')">Kontak</button></li>
            <li><a href="#" onclick="event.preventDefault()">Krida &amp; SKK</a></li>
            <li><a href="#" onclick="event.preventDefault()">Kwarda Bali</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h5>Sekretariat</h5>
          <ul>
            <li class="contact-item"><b>Alamat</b>Markas komandon TNI AU I Gusti Ngurah Rai Bali, badung</li>
            <li class="contact-item"><b>Email</b>sk.dirgantara.bali@gmail.com</li>
            <li class="contact-item"><b>Latihan</b>Sabtu, 14.00–17.00 WITA</li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="wrap">
      <div class="foot-note">© 2026 Saka Dirgantara — Lanud I Gusti Ngurah Rai. Seluruh hak cipta dilindungi.</div>
      <div class="foot-legal">
        <span>POWERED BY</span>
        <span>SKYNUSA TECH</span>
        <a href="<?php echo e(url('/admin/login')); ?>" class="foot-admin-link">Login Admin</a>
      </div>
    </div>
  </div>
</footer>

<script>
/* ================= DATA ================= */
const KRIDA = [
  {code:"KRIDA 01", name:"Olahraga Dirgantara", desc:"Memperkenalkan olahraga dirgantara sesuai kemampuan dan fasilitas pangkalan.",
   items:["Olahraga Dirgantara","Paralayang &amp; gantole","Terjun payung","Aeromodelling"]},
  {code:"KRIDA 02", name:"Pengetahuan Dirgantara", desc:"Mempelajari ilmu dasar penerbangan dan perkembangan teknologi kedirgantaraan.",
   items:["Navigasi udara","Meteorologi penerbangan","Komunikasi penerbangan","Keselamatan &amp; teknologi dirgantara"]},
  {code:"KRIDA 03", name:"Jasa Kedirgantaraan", desc:"Mengembangkan keterampilan pelayanan dan pengabdian di bidang kedirgantaraan.",
   items:["Dukungan kegiatan penerbangan","Search and Rescue (SAR)","Pelayanan masyarakat","Kegiatan sosial"]},
];
const KRIDA_NAMES = KRIDA.map(k=>k.name);

const TUJUAN = [
  "Meningkatkan pengetahuan dan keterampilan anggota Pramuka di bidang kedirgantaraan.",
  "Menumbuhkan rasa cinta terhadap dunia penerbangan dan antariksa.",
  "Membentuk sikap disiplin, tanggung jawab, kepemimpinan, dan kerja sama.",
  "Menyiapkan kader bangsa yang memiliki kemampuan teknis dan wawasan dirgantara.",
  "Mendukung pembinaan bela negara melalui kegiatan yang positif dan edukatif.",
];

const BIDANG = ["Pengetahuan dasar penerbangan","Aeromodelling","Navigasi udara","Meteorologi penerbangan","Keselamatan penerbangan","Teknologi kedirgantaraan","Search and Rescue (SAR)","Komunikasi radio","Kepemimpinan &amp; manajemen organisasi"];

const KEGIATAN = [
  {t:"Latihan Rutin", d:"Latihan mingguan di masing-masing pangkalan sesuai jadwal krida."},
  {t:"Pendidikan &amp; Pelatihan (Diklat)", d:"Pembekalan materi dan praktik terstruktur bagi anggota baru maupun lanjutan."},
  {t:"Perkemahan Bakti Saka Dirgantara", d:"Kegiatan berkemah sekaligus bakti masyarakat di lokasi terpilih."},
  {t:"Air Scout Camp (ASC)", d:"Perkemahan tematik kedirgantaraan tingkat daerah maupun nasional."},
  {t:"Kunjungan Edukasi", d:"Kunjungan ke pangkalan udara, bandara, atau sekolah penerbangan."},
  {t:"Pelatihan Aeromodelling", d:"Perakitan dan uji terbang pesawat model bersama pembina."},
  {t:"Pelatihan Komunikasi Radio", d:"Praktik prosedur komunikasi radio penerbangan."},
  {t:"Simulasi Keselamatan Penerbangan", d:"Latihan prosedur keselamatan dan tanggap darurat penerbangan."},
  {t:"Latihan SAR &amp; Pertolongan Pertama", d:"Simulasi pencarian, pertolongan, dan penanganan darurat dasar."},
];

/* Data Pangkalan & Data Anggota — diambil dari database (tabel pangkalans dan
   members) melalui HomeController. Struktur objek sengaja disamakan persis
   dengan struktur data statis versi lama supaya markup/JS peta & filter di
   bawah ini tidak perlu diubah. Kelola melalui Panel Admin → Pangkalan &
   Panel Admin → Data Anggota. */
const PANGKALAN = <?php echo json_encode($pangkalanData, 15, 512) ?>;
const MEMBERS = <?php echo json_encode($membersData, 15, 512) ?>;

/* Data Dirga News — diambil dari database (tabel dirga_news) melalui HomeController.
   Struktur objek (cat, date, title, excerpt, content) sengaja disamakan persis
   dengan versi statis sebelumnya agar tampilan/markup tidak berubah sama sekali. */
const NEWS = <?php echo json_encode($newsData, 15, 512) ?>;

/* Susunan Dewan Saka — Lanud I Gusti Ngurah Rai, Masa Bakti 2026-2028 */
const DEWAN_SAKA = [
  {no:1, jabatan:"Ketua Dewan Saka Dirgantara", nama:["Royce Francis Maulana Maliq, S.Kom."]},
  {no:2, jabatan:"Wakil Ketua Dewan Saka Dirgantara", nama:["Franskia Muji Irsadianto"]},
  {no:3, jabatan:"Sekretaris I", nama:["Mardiansyah Putri"]},
  {no:4, jabatan:"Sekretaris II", nama:["I Gusti Ayu Juni Katari Dewi"]},
  {no:5, jabatan:"Bendahara I", nama:["Chelsea Indah Setiawan"]},
  {no:6, jabatan:"Bendahara II", nama:["Ni Kadek Sri Darmayanti"]},
  {no:7, jabatan:"Bendahara III", nama:["Julianti Safira Putri"]},
  {no:8, jabatan:"Krida Olahraga Dirgantara", nama:["Muhamad Digjaya Dwi Rohman","Ni Putu Kesya Pradnyani Rianti","Dea Aurell Kanzania Putri"]},
  {no:9, jabatan:"Krida Pengetahuan Dirgantara", nama:["Naufal Resta Aqil Thayyar","Adisty Zahra Aulia Putri","Ni Ketut Ratna Widianti"]},
  {no:10, jabatan:"Krida Jasa Kedirgantaraan", nama:["Muhammad Rihaf Ababil Amien","Nasila Dwi Anjani Sahrela","Wulan Angestu"]},
];

/* Data Galeri (dokumentasi ilustratif) */
const GALLERY_CATS = ["Semua","Latihan","Perkemahan","Kunjungan","Bakti Sosial","Prestasi"];
const galleryIcons = {
  Latihan: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 2 L14 9 L21 12 L14 13 L12 22 L10 13 L3 12 L10 9 Z"/></svg>`,
  Perkemahan: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 20 L12 5 L20 20 M8 20 L12 12 L16 20"/></svg>`,
  Kunjungan: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21 L21 21 M6 21 V9 L12 4 L18 9 V21 M10 21 V14 H14 V21"/></svg>`,
  "Bakti Sosial": `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 21c-4-3-8-6.5-8-11a4.5 4.5 0 0 1 8-2.7A4.5 4.5 0 0 1 20 10c0 4.5-4 8-8 11Z"/></svg>`,
  Prestasi: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8" r="5.2"/><path d="M8.5 12.8 L7 21 L12 18 L17 21 L15.5 12.8"/></svg>`,
};
/* Data Galeri — diambil dari database (tabel galleries) melalui HomeController.
   Catatan: skema tabel galleries (judul, foto, deskripsi, tanggal) tidak memiliki
   kolom kategori, sehingga field "cat" diisi nilai default agar kartu tetap
   tampil dengan ikon yang sama seperti sebelumnya (tampilan tidak diubah).
   Jika ke depannya dibutuhkan kategori asli, tambahkan kolom "kategori" pada
   migration galleries dan sesuaikan HomeController. */
const GALLERY = <?php echo json_encode($galleryData, 15, 512) ?>;

/* Kategori Layanan Aspirasi & Pelaporan Masyarakat */
const LAP_KATEGORI = [
  {key:"Keselamatan Penerbangan", desc:"Melaporkan aktivitas yang berpotensi mengganggu keselamatan penerbangan.",
   examples:["Layang-layang dekat bandara","Balon udara liar","Laser diarahkan ke pesawat","Drone tanpa izin"],
   icon:`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2 L14 9 L21 12 L14 13 L12 22 L10 13 L3 12 L10 9 Z"/></svg>`},
  {key:"Lingkungan dan Fasilitas", desc:"Melaporkan kondisi lingkungan atau fasilitas yang berkaitan dengan kegiatan Saka Dirgantara.",
   examples:["Sampah di lokasi latihan","Fasilitas rusak","Area latihan tidak aman"],
   icon:`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 21h16M6 21V9l6-5 6 5v12M10 21v-6h4v6"/></svg>`},
  {key:"Permohonan Edukasi", desc:"Sekolah, komunitas, maupun instansi dapat mengajukan sosialisasi kedirgantaraan.",
   examples:["Dunia kedirgantaraan","Keselamatan penerbangan","Kepramukaan","Profesi penerbangan"],
   icon:`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 6.5 12 3l9 3.5-9 3.5-9-3.5Z"/><path d="M6 9v5c0 1.7 2.7 3 6 3s6-1.3 6-3V9"/></svg>`},
  {key:"Permohonan Kegiatan", desc:"Mengajukan permintaan narasumber, pelatihan, demonstrasi, bakti masyarakat, atau expo.",
   examples:["Narasumber","Pelatihan","Bakti masyarakat","Pameran / expo"],
   icon:`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>`},
  {key:"Pengaduan Website", desc:"Melaporkan kendala teknis pada website.",
   examples:["Tidak bisa login","Error sistem","Data tidak muncul","Bug website"],
   icon:`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 9h18M8 21h8"/></svg>`},
  {key:"Kritik dan Saran", desc:"Memberikan kritik, saran, maupun ide untuk peningkatan pelayanan dan kegiatan.",
   examples:["Ide kegiatan baru","Masukan pelayanan","Evaluasi program"],
   icon:`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.5 8.5 0 1 1-3.4-6.8"/><path d="M21 4v6h-6"/></svg>`},
];

function lapStatusClass(s){
  return {"Menunggu Verifikasi":"menunggu","Sedang Diproses":"diproses","Diteruskan ke Instansi Terkait":"diteruskan","Selesai":"selesai","Ditolak":"ditolak"}[s] || "menunggu";
}
const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content || "";

/* ================= NAV ================= */
function goPage(id){
  document.querySelectorAll(".page").forEach(p=>p.classList.remove("active"));
  document.getElementById("page-"+id).classList.add("active");
  document.querySelectorAll(".navlinks button").forEach(b=>b.classList.toggle("active", b.dataset.page===id));
  document.getElementById("navlinks").classList.remove("open");
  window.scrollTo({top:0,behavior:"smooth"});
  if(id==="peta"){ setTimeout(()=>{ if(window._map) window._map.invalidateSize(); },150); }
}
document.querySelectorAll(".navlinks button[data-page]").forEach(b=>b.addEventListener("click",()=>goPage(b.dataset.page)));
document.getElementById("navburger").addEventListener("click",()=>document.getElementById("navlinks").classList.toggle("open"));

/* ================= STATS ================= */
document.getElementById("stat-total").textContent = MEMBERS.length;
document.getElementById("stat-aktif").textContent = MEMBERS.filter(m=>m.status==="Aktif").length;
document.getElementById("stat-pangkalan").textContent = PANGKALAN.length;

/* ================= TUJUAN ================= */
document.getElementById("tujuan-list").innerHTML = TUJUAN.map((t,i)=>`
  <div class="tujuan-item">
    <div class="tujuan-num">0${i+1}</div>
    <p>${t}</p>
  </div>`).join("");

/* ================= BIDANG ================= */
document.getElementById("bidang-grid").innerHTML = BIDANG.map((b,i)=>`
  <div class="bidang-item">
    <span class="bnum">0${i+1}</span>
    <p>${b}</p>
  </div>`).join("");

/* ================= KRIDA ================= */
document.getElementById("krida-grid").innerHTML = KRIDA.map(k=>`
  <div class="krida-card">
    <span class="kcode">${k.code}</span>
    <h3>${k.name}</h3>
    <p>${k.desc}</p>
    <ul>${k.items.map(it=>`<li>${it}</li>`).join("")}</ul>
  </div>`).join("");

/* ================= KEGIATAN ================= */
const kegiatanIcon = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 2 L14 9 L21 12 L14 13 L12 22 L10 13 L3 12 L10 9 Z"/></svg>`;
document.getElementById("kegiatan-grid").innerHTML = KEGIATAN.slice(0,6).map(k=>`
  <div class="kegiatan-card">
    <div class="kegiatan-icon">${kegiatanIcon}</div>
    <h4>${k.t}</h4>
    <p>${k.d}</p>
  </div>`).join("");

/* ================= SUSUNAN DEWAN SAKA ================= */
document.getElementById("dewan-table").innerHTML =
  `<div class="dewan-row head"><div>No.</div><div>Kedudukan</div><div>Nama</div></div>` +
  DEWAN_SAKA.map(d=>`
    <div class="dewan-row">
      <div class="dno">${d.no}</div>
      <div class="djabatan">${d.jabatan}</div>
      <div class="dnama">${d.nama.map(n=>`<span>${n}</span>`).join("")}</div>
    </div>`).join("");

/* ================= NEWS ================= */
const planeSvg = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 2 L14 9 L21 12 L14 13 L12 22 L10 13 L3 12 L10 9 Z"/></svg>`;
document.getElementById("news-grid").innerHTML = NEWS.map((n,i)=>{
  const bg = n.thumbnail ? ` style="background-image:url('${n.thumbnail}');background-size:cover;background-position:center;"` : "";
  const icon = n.thumbnail ? "" : planeSvg;
  return `
  <div class="news-card" onclick="openModal(${i})">
    <div class="news-thumb${n.thumbnail ? ' has-photo' : ''}"${bg}><span class="news-cat">${n.cat}</span>${icon}</div>
    <div class="news-body">
      <div class="news-date">${n.date}</div>
      <h3>${n.title}</h3>
      <p>${n.excerpt}</p>
      <div class="news-link">Baca selengkapnya →</div>
    </div>
  </div>`;
}).join("");

function openModal(i){
  const n = NEWS[i];
  const heroEl = document.getElementById("modal-hero");
  if(n.thumbnail){
    heroEl.style.display = "";
    heroEl.style.backgroundImage = `url('${n.thumbnail}')`;
  } else {
    heroEl.style.display = "none";
    heroEl.style.backgroundImage = "";
  }
  document.getElementById("modal-cat").textContent = n.cat;
  document.getElementById("modal-date").textContent = n.date;
  document.getElementById("modal-author").textContent = n.penulis ? `Oleh ${n.penulis}` : "";
  document.getElementById("modal-title").textContent = n.title;
  const paragraf = Array.isArray(n.content) && n.content.length ? n.content : [n.content || ""];
  document.getElementById("modal-content").innerHTML = paragraf.map(p=>`<p>${p}</p>`).join("");
  document.getElementById("news-modal").classList.add("open");
  document.getElementById("news-modal").querySelector(".article-body").scrollTop = 0;
}
function closeModal(){ document.getElementById("news-modal").classList.remove("open"); }
document.getElementById("news-modal").addEventListener("click", e=>{ if(e.target.id==="news-modal") closeModal(); });

/* ================= GALERI ================= */
let galleryFilterActive = "Semua";
document.getElementById("gallery-filter").innerHTML = GALLERY_CATS.map(c=>
  `<button class="gfilter-btn ${c==='Semua'?'active':''}" data-cat="${c}">${c}</button>`).join("");

function renderGallery(){
  const items = GALLERY.filter(g=> galleryFilterActive==="Semua" || g.cat===galleryFilterActive);
  /* Jika foto diunggah lewat Panel Admin, tampilkan foto aslinya sebagai
     background kartu. Kalau belum ada foto, tetap pakai ikon generik seperti
     sebelumnya supaya kartu tidak kosong. Ini memperbaiki bug lama: apapun
     foto yang diupload admin, kartu galeri selalu tampil sama (hanya ikon). */
  document.getElementById("gallery-grid").innerHTML = items.map((g,i)=>{
    const bg = g.foto ? ` style="background-image:url('${g.foto}');background-size:cover;background-position:center;"` : "";
    const icon = g.foto ? "" : (galleryIcons[g.cat] || planeSvg);
    return `
    <div class="gitem${g.foto ? ' has-photo' : ''}"${bg} onclick="openGalleryModal('${g.cat}','${g.title.replace(/'/g,"\\'")}','${g.desc.replace(/'/g,"\\'")}')">
      <span class="gcat">${g.cat}</span>
      ${icon}
      <div class="gcap">${g.title}<small>${g.cat}</small></div>
    </div>`;
  }).join("");
}
document.getElementById("gallery-filter").addEventListener("click", e=>{
  const btn = e.target.closest(".gfilter-btn");
  if(!btn) return;
  galleryFilterActive = btn.dataset.cat;
  document.querySelectorAll(".gfilter-btn").forEach(b=>b.classList.toggle("active", b===btn));
  renderGallery();
});
renderGallery();

function openGalleryModal(cat,title,desc){
  document.getElementById("gmodal-cat").textContent = cat;
  document.getElementById("gmodal-title").textContent = title;
  document.getElementById("gmodal-desc").textContent = desc;
  document.getElementById("gallery-modal").classList.add("open");
}
function closeGalleryModal(){ document.getElementById("gallery-modal").classList.remove("open"); }
document.getElementById("gallery-modal").addEventListener("click", e=>{ if(e.target.id==="gallery-modal") closeGalleryModal(); });

/* ================= DATA ANGGOTA ================= */
/* Daftar angkatan dibangun otomatis dari data anggota yang ada di database,
   supaya filter selalu sinkron dengan data sebenarnya (sebelumnya kode di
   sini memanggil variabel ANGKATAN yang tidak pernah didefinisikan, sehingga
   error dan menghentikan SEMUA script di bawahnya — termasuk Data Anggota,
   Peta Sebaran, dan form Cek Status Laporan). */
const ANGKATAN = [...new Set(MEMBERS.map(m=>m.angkatan).filter(Boolean))];
const selAngkatan = document.getElementById("filter-angkatan");
ANGKATAN.forEach(a=>selAngkatan.insertAdjacentHTML("beforeend", `<option value="${a}">${a}</option>`));
const selPangkalan = document.getElementById("filter-pangkalan");
PANGKALAN.forEach(p=>selPangkalan.insertAdjacentHTML("beforeend", `<option value="${p.nama}">${p.nama}</option>`));
const selKrida = document.getElementById("filter-krida");
KRIDA_NAMES.forEach(k=>selKrida.insertAdjacentHTML("beforeend", `<option value="${k}">${k}</option>`));

const personSvg = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8" r="3.4"/><path d="M4.5 20c1.6-3.8 5-5.5 7.5-5.5s5.9 1.7 7.5 5.5"/></svg>`;

function renderMembers(){
  const q = document.getElementById("search-input").value.trim().toLowerCase();
  const fStatus = document.getElementById("filter-status").value;
  const fAngkatan = selAngkatan.value;
  const fPangkalan = selPangkalan.value;
  const fKrida = selKrida.value;

  const results = MEMBERS.filter(m=>{
    if(fStatus && m.status!==fStatus) return false;
    if(fAngkatan && m.angkatan!==fAngkatan) return false;
    if(fPangkalan && m.pangkalan!==fPangkalan) return false;
    if(fKrida && m.krida!==fKrida) return false;
    if(!q) return true;
    const hay = [m.nama,m.angkatan,m.pangkalan,m.kota,m.krida,m.sertifikasi,m.jabatan,m.status,m.id].join(" ").toLowerCase();
    return hay.includes(q);
  });

  document.getElementById("result-count").textContent = `${results.length} dari ${MEMBERS.length} anggota ditemukan`;

  const grid = document.getElementById("member-grid");
  if(results.length===0){
    grid.innerHTML = `<div class="empty-state" style="grid-column:1/-1;">Tidak ada anggota yang cocok dengan pencarian.</div>`;
    return;
  }
  grid.innerHTML = results.map(m=>`
    <div class="mcard">
      <span class="status-pill ${m.status==='Aktif'?'aktif':'nonaktif'}">${m.status}</span>
      <div class="mcard-top">
        <div class="mcard-photo">${personSvg}</div>
        <div>
          <div class="mcard-name">${m.nama}</div>
          <div class="mcard-nrp">${m.id}</div>
        </div>
      </div>
      <div class="mcard-info">
        <div><span class="k">Angkatan</span><span class="v">${m.angkatan}</span></div>
        <div><span class="k">Pangkalan</span><span class="v">${m.pangkalan}</span></div>
        <div><span class="k">Krida</span><span class="v">${m.krida}</span></div>
        <div><span class="k">Sertifikasi</span><span class="v">${m.sertifikasi}</span></div>
        <div><span class="k">Jabatan</span><span class="v">${m.jabatan}</span></div>
      </div>
    </div>`).join("");
}
["search-input"].forEach(id=>document.getElementById(id).addEventListener("input", renderMembers));
["filter-status","filter-angkatan","filter-pangkalan","filter-krida"].forEach(id=>document.getElementById(id).addEventListener("change", renderMembers));
renderMembers();

/* ================= AYO GABUNG (FORM) ================= */
const joinPangkalanInput = document.getElementById("join-pangkalan");
const joinPangkalanList = document.getElementById("join-pangkalan-list");
// Saran nama pangkalan yang sudah ada, supaya pendaftar tidak membuat nama
// ganda karena typo — tapi tetap bisa mengetik nama pangkalan/sekolah baru
// yang belum ada di daftar.
PANGKALAN.forEach(p=>joinPangkalanList.insertAdjacentHTML("beforeend", `<option value="${p.nama}"></option>`));
const joinKridaSel = document.getElementById("join-krida");
KRIDA_NAMES.forEach(k=>joinKridaSel.insertAdjacentHTML("beforeend", `<option value="${k}">${k}</option>`));

document.getElementById("join-form-el").addEventListener("submit", function(e){
  e.preventDefault();
  const btn = this.querySelector("button[type=submit]");
  const originalLabel = btn.textContent;
  btn.disabled = true;
  btn.textContent = "Mengirim...";

  const payload = {
    nama: document.getElementById("join-nama").value.trim(),
    email: document.getElementById("join-email").value.trim(),
    pangkalan_nama: joinPangkalanInput.value.trim(),
    krida: joinKridaSel.value,
    no_hp: document.getElementById("join-wa").value.trim(),
  };

  fetch("<?php echo e(route('pendaftaran.store', [], false)); ?>", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify(payload),
  })
  .then(async res => {
    const data = await res.json();
    if(!res.ok){ throw data; }
    return data;
  })
  .then(data => {
    this.style.display = "none";
    document.getElementById("join-success-kode").textContent = data.kode_pendaftaran;
    document.getElementById("join-success-text").textContent =
      "Pengurus pangkalan akan menghubungi kamu melalui WhatsApp untuk proses selanjutnya. Konfirmasi beserta kode pendaftaran ini juga telah dikirim ke email kamu.";
    document.getElementById("join-success").classList.add("show");
  })
  .catch(err => {
    const firstError = err?.errors
      ? Object.values(err.errors)[0][0]
      : (err?.message && !(err instanceof TypeError) ? err.message : "Terjadi kesalahan, silakan coba lagi.");
    lapToast(firstError);
  })
  .finally(() => {
    btn.disabled = false;
    btn.textContent = originalLabel;
  });
});

function joinResetForm(){
  document.getElementById("join-form-el").reset();
  document.getElementById("join-form-el").style.display = "grid";
  document.getElementById("join-success").classList.remove("show");
}

/* ================= LAYANAN ASPIRASI & PELAPORAN ================= */

/* tabs */
document.querySelectorAll(".lap-tab").forEach(tab=>{
  tab.addEventListener("click", ()=>{
    document.querySelectorAll(".lap-tab").forEach(t=>t.classList.remove("active"));
    document.querySelectorAll(".lap-panel").forEach(p=>p.classList.remove("active"));
    tab.classList.add("active");
    document.getElementById("lap-tab-"+tab.dataset.tab).classList.add("active");
  });
});

/* category cards */
document.getElementById("lap-cat-grid").innerHTML = LAP_KATEGORI.map(c=>`
  <div class="lap-cat" data-cat="${c.key}">
    <div class="lcicon">${c.icon}</div>
    <h4>${c.key}</h4>
    <p>${c.desc}</p>
    <div class="lcexamples">${c.examples.map(e=>"— "+e).join("<br>")}</div>
  </div>`).join("");

const lapKategoriSel = document.getElementById("lap-kategori");
LAP_KATEGORI.forEach(c=>lapKategoriSel.insertAdjacentHTML("beforeend", `<option value="${c.key}">${c.key}</option>`));

document.getElementById("lap-cat-grid").addEventListener("click", e=>{
  const card = e.target.closest(".lap-cat");
  if(!card) return;
  document.querySelectorAll(".lap-cat").forEach(c=>c.classList.toggle("selected", c===card));
  lapKategoriSel.value = card.dataset.cat;
  document.getElementById("lap-form").scrollIntoView({behavior:"smooth", block:"start"});
});

/* toast */
function lapToast(msg){
  let t = document.getElementById("lap-toast");
  if(!t){
    t = document.createElement("div");
    t.className = "toast";
    t.id = "lap-toast";
    t.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 6 9 17l-5-5"/></svg><span id="lap-toast-msg"></span>`;
    document.body.appendChild(t);
  }
  document.getElementById("lap-toast-msg").textContent = msg;
  t.classList.add("show");
  clearTimeout(t._timer);
  t._timer = setTimeout(()=>t.classList.remove("show"), 3200);
}

/* submit form */
document.getElementById("lap-form").addEventListener("submit", function(e){
  e.preventDefault();
  const btn = this.querySelector("button[type=submit]");
  const originalLabel = btn.textContent;
  btn.disabled = true;
  btn.textContent = "Mengirim...";

  const rahasia = document.querySelector('input[name="lap-rahasia"]:checked').value;
  const fd = new FormData();
  fd.append("nama", document.getElementById("lap-nama").value.trim());
  fd.append("email", document.getElementById("lap-email").value.trim());
  fd.append("no_hp", document.getElementById("lap-wa").value.trim());
  fd.append("instansi", document.getElementById("lap-instansi").value.trim());
  fd.append("kota", document.getElementById("lap-kota").value.trim());
  fd.append("kategori", lapKategoriSel.value);
  fd.append("judul", document.getElementById("lap-judul").value.trim());
  fd.append("deskripsi", document.getElementById("lap-deskripsi").value.trim());
  fd.append("lokasi_kejadian", document.getElementById("lap-lokasi").value.trim());
  fd.append("tanggal_kejadian", document.getElementById("lap-tanggal").value);
  fd.append("jam_kejadian", document.getElementById("lap-jam").value);
  fd.append("kerahasiaan", rahasia);
  fd.append("consent", document.getElementById("lap-consent").checked ? "1" : "0");
  const files = document.getElementById("lap-file").files;
  for(let i=0;i<files.length;i++){ fd.append("lampiran[]", files[i]); }

  fetch("<?php echo e(route('aspirasi.store', [], false)); ?>", {
    method: "POST",
    headers: { "Accept": "application/json", "X-CSRF-TOKEN": CSRF_TOKEN },
    body: fd,
  })
  .then(async res => {
    const data = await res.json();
    if(!res.ok){ throw data; }
    return data;
  })
  .then(data => {
    document.getElementById("lap-form").style.display = "none";
    document.getElementById("lap-success").classList.add("show");
    document.getElementById("lap-success-id").textContent = data.nomor_tiket;
    lapToast("Laporan berhasil dikirim");
  })
  .catch(err => {
    const firstError = err?.errors
      ? Object.values(err.errors)[0][0]
      : (err?.message && !(err instanceof TypeError) ? err.message : "Terjadi kesalahan, silakan coba lagi.");
    lapToast(firstError);
  })
  .finally(() => {
    btn.disabled = false;
    btn.textContent = originalLabel;
  });
});

function lapResetForm(){
  document.getElementById("lap-form").reset();
  document.getElementById("lap-form").style.display = "block";
  document.getElementById("lap-success").classList.remove("show");
  document.querySelectorAll(".lap-cat").forEach(c=>c.classList.remove("selected"));
}

/* cek status */
function lapCheckStatus(){
  const q = document.getElementById("lap-check-input").value.trim();
  const box = document.getElementById("lap-check-result");
  if(!q){ box.innerHTML = ""; return; }
  box.innerHTML = `<div class="lap-not-found">Mencari data laporan…</div>`;

  fetch(`<?php echo e(route('aspirasi.check', [], false)); ?>?query=${encodeURIComponent(q)}`, {
    headers: { "Accept": "application/json" },
  })
  .then(async res => {
    const data = await res.json();
    if(!res.ok){ throw data; }
    return data;
  })
  .then(data => {
    box.innerHTML = data.data.map(found => `
      <div class="lap-result-card">
        <div class="lap-result-head">
          <h4>${found.judul}</h4>
          <span class="status-pill ${lapStatusClass(found.status)}">${found.status}</span>
        </div>
        <div class="lap-result-meta">${found.nomor_tiket} · ${found.kategori} · ${found.kota} · Diajukan ${found.tanggal}</div>
        <div class="lap-timeline">
          ${found.riwayat.map((l,i)=>`
            <div class="lap-tl-item done">
              <div class="lap-tl-dot"></div>
              <div class="lap-tl-body"><b>${l.catatan}</b><span>${l.tanggal}</span></div>
            </div>`).join("")}
        </div>
      </div>`).join("");
  })
  .catch(err => {
    box.innerHTML = `<div class="lap-not-found">Data laporan dengan tiket/email "${q}" tidak ditemukan. Periksa kembali nomor tiket atau email yang digunakan saat mengajukan laporan.</div>`;
  });
}
document.getElementById("lap-check-input").addEventListener("keydown", e=>{ if(e.key==="Enter") lapCheckStatus(); });

/* ================= PETA ================= */
function initMap(){
  const map = L.map("map", {scrollWheelZoom:false}).setView([-8.42, 115.19], 10);
  window._map = map;
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution:'&copy; OpenStreetMap contributors', maxZoom:17
  }).addTo(map);

  const markers = {};
  // Pangkalan yang otomatis dibuat dari formulir pendaftaran belum tentu
  // punya koordinat (diisi admin belakangan), jadi marker peta dilewati
  // untuk pangkalan tanpa lat/lng — tapi tetap muncul di daftar sisi peta.
  PANGKALAN.filter(p=>p.lat!=null && p.lng!=null).forEach(p=>{
    const members = MEMBERS.filter(m=>m.pangkalanId===p.id);
    const aktifCount = members.filter(m=>m.status==="Aktif").length;
    const radius = 8 + members.length*1.3;
    const marker = L.circleMarker([p.lat,p.lng], {
      radius, color:"#4fa3d1", weight:2, fillColor:"#4fa3d1", fillOpacity:0.35
    }).addTo(map);

    const listHtml = members.map(m=>`<div>• ${m.nama} — ${m.status}</div>`).join("");
    marker.bindPopup(`
      <div class="popup-title">${p.nama}</div>
      <div class="popup-sub">${p.kota} · ${aktifCount} aktif / ${members.length} total</div>
      <div class="popup-list">${listHtml}</div>
    `);
    markers[p.id] = marker;
  });

  const listEl = document.getElementById("pangkalan-list");
  listEl.innerHTML = PANGKALAN.map(p=>{
    const count = MEMBERS.filter(m=>m.pangkalanId===p.id).length;
    return `<div class="pangkalan-item" data-id="${p.id}">
      <h4>${p.nama}</h4>
      <div class="loc">${p.kota ?? 'Lokasi belum diatur'}</div>
      <div class="count">${count} anggota</div>
    </div>`;
  }).join("");

  listEl.querySelectorAll(".pangkalan-item").forEach(item=>{
    item.addEventListener("click", ()=>{
      const p = PANGKALAN.find(x=>String(x.id)===item.dataset.id);
      if(!p || p.lat==null || p.lng==null) return;
      map.setView([p.lat,p.lng], 12, {animate:true});
      markers[p.id]?.openPopup();
    });
  });
}
window.addEventListener("load", initMap);
</script>
</body>
</html><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/index.blade.php ENDPATH**/ ?>