/*!
 * Saka Dirgantara — pengalih bahasa Indonesia (ID) / English (EN).
 *
 * Cara kerja: teks Indonesia tetap menjadi isi asli HTML (jadi tampilan awal
 * SELALU Bahasa Indonesia). Saat tombol EN ditekan, setiap teks yang ada di
 * kamus DICT diganti ke Bahasa Inggris, dan dikembalikan saat tombol ID
 * ditekan. Konten yang dikelola dari database/Panel Admin (judul berita,
 * nama anggota, nama pangkalan, dst.) tidak diterjemahkan otomatis.
 *
 * Menambah/mengubah terjemahan: edit objek DICT di bawah — kunci = teks
 * Indonesia persis seperti tampil di halaman, nilai = terjemahan Inggrisnya.
 */
(function () {
  'use strict';

  var STORAGE_KEY = 'saka_lang';
  var ATTRS = ['placeholder', 'title', 'alt', 'aria-label'];
  var SKIP_TAGS = { SCRIPT: 1, STYLE: 1, TEXTAREA: 1, NOSCRIPT: 1 };

  var DICT = {
    "Saka Dirgantara — Kwartir Daerah Bali": "Saka Dirgantara — Bali Regional Branch",
    "Daerah Bali": "Bali Region",
    "Beranda": "Home",
    "Galeri": "Gallery",
    "Data Anggota": "Members",
    "Peta Sebaran": "Member Map",
    "Layanan Aspirasi": "Aspirations",
    "Kontak": "Contact",
    "Ayo Gabung →": "Join Us →",
    "Satuan Karya Pramuka Dirgantara Lanud I Gusti Ngurah Rai Bali": "Aerospace Scout Specialty Unit · I Gusti Ngurah Rai Air Force Base, Bali",
    "Membina Generasi Muda untuk": "Nurturing Young People for",
    "Angkasa Indonesia": "Indonesian Skies",
    "Saka Dirgantara merupakan wadah pendidikan bagi anggota Gerakan Pramuka untuk menyalurkan minat, mengembangkan pengetahuan, keterampilan, kecakapan, pengalaman, dan kepemimpinan di bidang kedirgantaraan. Melalui pembinaan bersama TNI Angkatan Udara dan dukungan berbagai mitra di bidang penerbangan, Saka Dirgantara membentuk generasi muda yang disiplin, berkarakter, serta memiliki wawasan kebangsaan dan semangat pengabdian kepada masyarakat.": "Saka Dirgantara is an educational platform for members of the Scout Movement (Gerakan Pramuka) to channel their interests and develop knowledge, skills, competence, experience, and leadership in aerospace. Through guidance together with the Indonesian Air Force (TNI AU) and the support of various aviation partners, Saka Dirgantara shapes young people who are disciplined, of strong character, and equipped with national awareness and a spirit of service to the community.",
    "Ayo Gabung Sekarang": "Join Now",
    "Lihat Galeri": "View Gallery",
    "Total Anggota": "Total Members",
    "Anggota Aktif": "Active Members",
    "Pangkalan": "Bases",
    "Krida Pembinaan": "Training Krida",
    "Tentang Kami": "About Us",
    "Wadah Pendidikan Kedirgantaraan bagi Pramuka Penegak dan Pandega": "Aerospace Education for Penegak and Pandega Scouts",
    "Saka Dirgantara merupakan Satuan Karya Pramuka yang menjadi wadah pendidikan guna menyalurkan minat serta mengembangkan bakat, kemampuan, pengalaman, pengetahuan, dan keterampilan anggota Gerakan Pramuka Penegak dan Pandega di bidang kedirgantaraan. Melalui berbagai kegiatan yang terarah, anggota dibina agar memiliki kecakapan, disiplin, jiwa kepemimpinan, rasa tanggung jawab, serta semangat pengabdian kepada masyarakat, bangsa, dan negara.": "Saka Dirgantara is a Scout Specialty Unit (Satuan Karya Pramuka) that serves as an educational platform to channel interests and develop the talents, abilities, experience, knowledge, and skills of Penegak and Pandega Scouts in the field of aerospace. Through purposeful activities, members are trained to gain competence, discipline, leadership, a sense of responsibility, and a spirit of service to the community, the nation, and the state.",
    "Penyelenggaraan pembinaan Saka Dirgantara dilaksanakan oleh Gerakan Pramuka bersama instansi pembina di bidang kedirgantaraan, terutama Tentara Nasional Indonesia Angkatan Udara (TNI AU), serta didukung oleh kementerian dan lembaga pemerintah, badan usaha milik negara (BUMN), perguruan tinggi, organisasi profesi, industri, maupun komunitas yang bergerak di bidang penerbangan dan kedirgantaraan. Melalui pendidikan kepramukaan yang dipadukan dengan pengetahuan dan keterampilan kedirgantaraan, Saka Dirgantara bertujuan membentuk generasi muda yang beriman dan bertakwa kepada Tuhan Yang Maha Esa, berkarakter, disiplin, berwawasan kebangsaan, serta mampu mengabdikan ilmu dan keterampilannya bagi kepentingan masyarakat, bangsa, dan negara.": "Saka Dirgantara training is carried out by the Scout Movement together with supervising institutions in aerospace, primarily the Indonesian Air Force (TNI AU), and is supported by government ministries and agencies, state-owned enterprises (BUMN), universities, professional organizations, industry, and communities active in aviation and aerospace. By combining scouting education with aerospace knowledge and skills, Saka Dirgantara aims to shape young people who are faithful and devout to God Almighty, of good character, disciplined, nationally minded, and able to dedicate their knowledge and skills to the benefit of the community, the nation, and the state.",
    "Semboyan": "Motto",
    "Janji pengabdian anggota Gerakan Pramuka untuk mengamalkan Satya dan Darma Pramuka dalam kehidupan sehari-hari, khususnya melalui pengabdian di bidang kedirgantaraan.": "The pledge of service of Scout Movement members to live out the Scout Promise (Satya) and Scout Law (Darma) in daily life, especially through service in the field of aerospace.",
    "Tujuan": "Objectives",
    "Tujuan Saka Dirgantara": "Objectives of Saka Dirgantara",
    "Lima arah pembinaan yang menjadi dasar setiap kegiatan di seluruh pangkalan.": "Five directions of training that underpin every activity at all bases.",
    "Bidang Pembinaan": "Training Areas",
    "Cakupan Materi Pembinaan": "Scope of Training Material",
    "Sembilan bidang yang dipelajari anggota secara bertahap sesuai jenjang SKK.": "Nine fields that members learn progressively according to their SKK (special skill badge) level.",
    "Krida": "Krida",
    "Tiga Krida Saka Dirgantara": "The Three Krida of Saka Dirgantara",
    "Berdasarkan Petunjuk Penyelenggaraan Saka Dirgantara yang berlaku, pembinaan terbagi ke dalam tiga krida.": "Under the prevailing Saka Dirgantara Implementation Guidelines, training is divided into three krida (specialty fields).",
    "Kegiatan": "Activities",
    "Kegiatan Unggulan": "Featured Activities",
    "Sebagian kegiatan rutin dan berkala yang dilaksanakan di tingkat pangkalan maupun daerah.": "A selection of regular and periodic activities held at the base and regional levels.",
    "Meningkatkan pengetahuan dan keterampilan anggota Pramuka di bidang kedirgantaraan.": "Improve the knowledge and skills of Scout members in the field of aerospace.",
    "Menumbuhkan rasa cinta terhadap dunia penerbangan dan antariksa.": "Foster a love for the world of aviation and space.",
    "Membentuk sikap disiplin, tanggung jawab, kepemimpinan, dan kerja sama.": "Build discipline, responsibility, leadership, and teamwork.",
    "Menyiapkan kader bangsa yang memiliki kemampuan teknis dan wawasan dirgantara.": "Prepare national cadres with technical ability and aerospace insight.",
    "Mendukung pembinaan bela negara melalui kegiatan yang positif dan edukatif.": "Support national defense awareness through positive and educational activities.",
    "Pengetahuan dasar penerbangan": "Basic aviation knowledge",
    "Navigasi udara": "Air navigation",
    "Meteorologi penerbangan": "Aviation meteorology",
    "Keselamatan penerbangan": "Flight safety",
    "Teknologi kedirgantaraan": "Aerospace technology",
    "Komunikasi radio": "Radio communication",
    "Kepemimpinan & manajemen organisasi": "Leadership & organizational management",
    "Olahraga Dirgantara": "Aerospace Sports",
    "Pengetahuan Dirgantara": "Aerospace Knowledge",
    "Jasa Kedirgantaraan": "Aerospace Services",
    "Memperkenalkan olahraga dirgantara sesuai kemampuan dan fasilitas pangkalan.": "Introducing aerospace sports according to the base's capabilities and facilities.",
    "Mempelajari ilmu dasar penerbangan dan perkembangan teknologi kedirgantaraan.": "Learning the fundamentals of aviation and developments in aerospace technology.",
    "Mengembangkan keterampilan pelayanan dan pengabdian di bidang kedirgantaraan.": "Developing service and community-contribution skills in the aerospace field.",
    "Paralayang & gantole": "Paragliding & hang gliding",
    "Terjun payung": "Skydiving",
    "Komunikasi penerbangan": "Aviation communication",
    "Keselamatan & teknologi dirgantara": "Aerospace safety & technology",
    "Dukungan kegiatan penerbangan": "Flight activity support",
    "Pelayanan masyarakat": "Public service",
    "Kegiatan sosial": "Social activities",
    "Latihan Rutin": "Regular Training",
    "Latihan mingguan di masing-masing pangkalan sesuai jadwal krida.": "Weekly training at each base according to the krida schedule.",
    "Pendidikan & Pelatihan (Diklat)": "Education & Training (Diklat)",
    "Pembekalan materi dan praktik terstruktur bagi anggota baru maupun lanjutan.": "Structured briefing and practice for new and continuing members.",
    "Perkemahan Bakti Saka Dirgantara": "Saka Dirgantara Service Camp",
    "Kegiatan berkemah sekaligus bakti masyarakat di lokasi terpilih.": "Camping combined with community service at selected locations.",
    "Perkemahan tematik kedirgantaraan tingkat daerah maupun nasional.": "Aerospace-themed camps at the regional and national level.",
    "Kunjungan Edukasi": "Educational Visits",
    "Kunjungan ke pangkalan udara, bandara, atau sekolah penerbangan.": "Visits to air bases, airports, or aviation schools.",
    "Pelatihan Aeromodelling": "Aeromodelling Training",
    "Perakitan dan uji terbang pesawat model bersama pembina.": "Building and test-flying model aircraft with instructors.",
    "Pelatihan Komunikasi Radio": "Radio Communication Training",
    "Praktik prosedur komunikasi radio penerbangan.": "Practice of aviation radio communication procedures.",
    "Simulasi Keselamatan Penerbangan": "Flight Safety Simulation",
    "Latihan prosedur keselamatan dan tanggap darurat penerbangan.": "Drills on flight safety and emergency response procedures.",
    "Latihan SAR & Pertolongan Pertama": "SAR & First Aid Training",
    "Simulasi pencarian, pertolongan, dan penanganan darurat dasar.": "Simulated search, rescue, and basic emergency handling.",
    "Struktur Organisasi": "Organization Structure",
    "Struktur Pembinaan Saka Dirgantara": "Saka Dirgantara Guidance Structure",
    "Struktur organisasi Saka Dirgantara terdiri atas unsur pembinaan, pengelolaan, dan peserta didik yang saling mendukung dalam penyelenggaraan pendidikan kepramukaan di bidang kedirgantaraan.": "The organization of Saka Dirgantara consists of guidance, management, and learner elements that support one another in delivering scouting education in the field of aerospace.",
    "Majelis Pembimbing Saka (Mabi Saka)": "Saka Advisory Council (Mabi Saka)",
    "Pimpinan Saka": "Saka Leadership (Pimpinan Saka)",
    "Pamong Saka": "Saka Mentors (Pamong Saka)",
    "Instruktur Saka": "Saka Instructors",
    "Dewan Saka": "Saka Council (Dewan Saka)",
    "Anggota Saka": "Saka Members",
    "Kepengurusan": "Leadership",
    "Susunan Dewan Saka": "Composition of the Saka Council",
    "Pengurus harian dan koordinator krida yang menjalankan roda organisasi sehari-hari.": "Daily administrators and krida coordinators who run the organization day to day.",
    "DEWAN SAKA DIRGANTARA · LANUD I GUSTI NGURAH RAI": "SAKA DIRGANTARA COUNCIL · I GUSTI NGURAH RAI AIR FORCE BASE",
    "Masa Bakti 2026–2028": "Term of Office 2026–2028",
    "Kedudukan": "Position",
    "Nama": "Name",
    "Ketua Dewan Saka Dirgantara": "Chair of the Saka Dirgantara Council",
    "Wakil Ketua Dewan Saka Dirgantara": "Vice Chair of the Saka Dirgantara Council",
    "Sekretaris I": "Secretary I",
    "Sekretaris II": "Secretary II",
    "Bendahara I": "Treasurer I",
    "Bendahara II": "Treasurer II",
    "Bendahara III": "Treasurer III",
    "Krida Olahraga Dirgantara": "Aerospace Sports Krida",
    "Krida Pengetahuan Dirgantara": "Aerospace Knowledge Krida",
    "Krida Jasa Kedirgantaraan": "Aerospace Services Krida",
    "Kerja Sama": "Partnership",
    "Mitra Pembinaan": "Training Partners",
    "Pembinaan dilaksanakan bersama instansi dan lembaga di bidang kedirgantaraan.": "Training is carried out together with agencies and institutions in the aerospace field.",
    "Mitra Utama": "Main Partner",
    "TNI Angkatan Udara": "Indonesian Air Force (TNI AU)",
    "Pemerintah": "Government",
    "Instansi Perhubungan Udara": "Air Transportation Agencies",
    "BUMN": "State-Owned Enterprises",
    "Industri & Layanan Dirgantara": "Aerospace Industry & Services",
    "Akademik": "Academia",
    "Perguruan Tinggi Penerbangan": "Aviation Universities",
    "Komunitas": "Community",
    "Komunitas Aviasi & Antariksa": "Aviation & Space Communities",
    "Jelajahi Sebaran Anggota di Seluruh Bali": "Explore Member Distribution Across Bali",
    "Lihat data anggota per pangkalan dan lokasinya di peta interaktif, ikuti kabar terbaru melalui Dirga News, atau langsung bergabung menjadi anggota.": "View member data per base and its location on the interactive map, follow the latest news through Dirga News, or join as a member right away.",
    "Buka Peta Sebaran": "Open Distribution Map",
    "Kabar & Kegiatan Saka Dirgantara Bali": "News & Activities of Saka Dirgantara Bali",
    "Liputan latihan gabungan, prestasi anggota, dan agenda kedirgantaraan dari seluruh pangkalan.": "Coverage of joint training, member achievements, and aerospace agendas from all bases.",
    "Baca selengkapnya →": "Read more →",
    "Dokumentasi Kegiatan Saka Dirgantara": "Documentation of Saka Dirgantara Activities",
    "Momen latihan, perkemahan, dan kegiatan bakti dari seluruh pangkalan se-Bali.": "Moments from training, camping, and community service activities at all bases across Bali.",
    "Semua": "All",
    "Latihan": "Training",
    "Perkemahan": "Camping",
    "Kunjungan": "Visits",
    "Bakti Sosial": "Community Service",
    "Prestasi": "Achievements",
    "Basis Data": "Database",
    "Cari berdasarkan nama, angkatan, pangkalan, krida, sertifikasi, jabatan, atau status keaktifan.": "Search by name, cohort (angkatan), base, krida, certification, position, or active status.",
    "Semua Status": "All Statuses",
    "Aktif": "Active",
    "Tidak Aktif": "Inactive",
    "Semua Angkatan": "All Cohorts",
    "Semua Pangkalan": "All Bases",
    "Semua Krida": "All Krida",
    "Angkatan": "Cohort",
    "Sertifikasi": "Certification",
    "Jabatan": "Position",
    "Anggota": "Member",
    "Tidak ada anggota yang cocok dengan pencarian.": "No members match your search.",
    "Jasa": "Services",
    "Pengetahuan": "Knowledge",
    "Ordirga": "Aerospace Sports",
    "Persebaran Anggota di Pulau Bali": "Member Distribution on the Island of Bali",
    "Klik penanda atau daftar pangkalan untuk melihat jumlah dan daftar anggota di lokasi tersebut.": "Click a marker or the base list to see the number and list of members at that location.",
    "Lokasi belum diatur": "Location not set",
    "Layanan Publik": "Public Service",
    "Layanan Aspirasi & Pelaporan Masyarakat": "Public Aspiration & Reporting Service",
    "Sampaikan laporan, aspirasi, atau permohonan yang berkaitan dengan kegiatan pengabdian masyarakat Saka Dirgantara di bidang kedirgantaraan.": "Submit reports, aspirations, or requests related to Saka Dirgantara's community service activities in the aerospace field.",
    "Pemberitahuan:": "Notice:",
    "Seluruh laporan akan diverifikasi terlebih dahulu oleh Admin Saka Dirgantara sebelum diteruskan kepada Pamong Saka, Dewan Saka, atau instansi terkait apabila diperlukan. Website ini": "All reports will first be verified by the Saka Dirgantara Admin before being forwarded to the Saka Mentors, the Saka Council, or relevant agencies when necessary. This website is",
    "bukan layanan darurat": "not an emergency service",
    "maupun pengganti layanan resmi TNI AU, AirNav Indonesia, maskapai penerbangan, atau pengelola bandara. Untuk situasi darurat penerbangan, segera hubungi pihak berwenang setempat.": "nor a replacement for the official services of the Indonesian Air Force, AirNav Indonesia, airlines, or airport operators. In an aviation emergency, contact the local authorities immediately.",
    "Ajukan Laporan": "Submit a Report",
    "Cek Status Laporan": "Check Report Status",
    "Panel Admin": "Admin Panel",
    "Informasi Pelapor / Permohonan edukasi": "Reporter Information / Education Request",
    "Nama Lengkap": "Full Name",
    "Nomor WhatsApp": "WhatsApp Number",
    "Instansi / Sekolah": "Institution / School",
    "Kota / Kabupaten": "City / Regency",
    "Detail Laporan / Permohonan edukasi": "Report Details / Education Request",
    "Kategori": "Category",
    "Judul Laporan": "Report Title",
    "Deskripsi Lengkap": "Full Description",
    "Lokasi Kejadian": "Incident Location",
    "Tanggal Kejadian": "Incident Date",
    "Jam Kejadian": "Incident Time",
    "Upload Bukti / permohonan": "Upload Evidence / Request",
    "File Pendukung": "Supporting Files",
    "Format didukung: JPG, PNG, PDF, MP4 · Maksimal 10 MB per file": "Supported formats: JPG, PNG, PDF, MP4 · Maximum 10 MB per file",
    "Tingkat Kerahasiaan": "Confidentiality Level",
    "Publik": "Public",
    "Dapat ditampilkan sebagai statistik umum": "May be shown as general statistics",
    "Rahasia": "Confidential",
    "Identitas hanya diketahui admin & pihak terkait": "Identity known only to the admin & relevant parties",
    "Anonim": "Anonymous",
    "Identitas disamarkan sepenuhnya": "Identity fully disguised",
    "Saya menyatakan bahwa informasi yang saya berikan benar dan dapat dipertanggungjawabkan.": "I declare that the information I have provided is true and accountable.",
    "Saya bukan robot (verifikasi keamanan)": "I am not a robot (security verification)",
    "Kirim Laporan": "Submit Report",
    "Laporan Berhasil Dikirim": "Report Submitted Successfully",
    "Simpan nomor tiket berikut untuk memeriksa status laporan Anda:": "Save the following ticket number to check the status of your report:",
    "Konfirmasi beserta nomor tiket ini juga telah dikirim ke email yang Anda daftarkan.": "A confirmation with this ticket number has also been sent to the email you registered.",
    "Ajukan Laporan Lain": "Submit Another Report",
    "Nomor Tiket atau Email Pelapor": "Ticket Number or Reporter Email",
    "Cari": "Search",
    "Akses Terbatas": "Restricted Access",
    "Panel Admin Resmi": "Official Admin Panel",
    "Pengelolaan laporan aspirasi & pelaporan masyarakat kini dilakukan melalui Panel Admin resmi Saka Dirgantara Bali dengan autentikasi sungguhan, bukan lagi kode akses demo di halaman publik ini.": "Aspiration & public report management is now handled through the official Saka Dirgantara Bali Admin Panel with real authentication, no longer through a demo access code on this public page.",
    "Masuk ke Panel Admin": "Sign In to Admin Panel",
    "Menunggu Verifikasi": "Pending Verification",
    "Sedang Diproses": "In Progress",
    "Diteruskan ke Instansi Terkait": "Forwarded to Relevant Agency",
    "Selesai": "Completed",
    "Ditolak": "Rejected",
    "Keselamatan Penerbangan": "Flight Safety",
    "Melaporkan aktivitas yang berpotensi mengganggu keselamatan penerbangan.": "Report activities that could endanger flight safety.",
    "— Layang-layang dekat bandara": "— Kites near the airport",
    "— Balon udara liar": "— Illegal hot-air balloons",
    "— Laser diarahkan ke pesawat": "— Lasers pointed at aircraft",
    "— Drone tanpa izin": "— Unauthorized drones",
    "Lingkungan dan Fasilitas": "Environment and Facilities",
    "Melaporkan kondisi lingkungan atau fasilitas yang berkaitan dengan kegiatan Saka Dirgantara.": "Report environmental conditions or facilities related to Saka Dirgantara activities.",
    "— Sampah di lokasi latihan": "— Litter at training sites",
    "— Fasilitas rusak": "— Damaged facilities",
    "— Area latihan tidak aman": "— Unsafe training areas",
    "Permohonan Edukasi": "Education Request",
    "Sekolah, komunitas, maupun instansi dapat mengajukan sosialisasi kedirgantaraan.": "Schools, communities, and agencies can request aerospace outreach sessions.",
    "— Dunia kedirgantaraan": "— The world of aerospace",
    "— Keselamatan penerbangan": "— Flight safety",
    "— Kepramukaan": "— Scouting",
    "— Profesi penerbangan": "— Aviation professions",
    "Permohonan Kegiatan": "Activity Request",
    "Mengajukan permintaan narasumber, pelatihan, demonstrasi, bakti masyarakat, atau expo.": "Submit requests for speakers, training, demonstrations, community service, or expos.",
    "— Narasumber": "— Speakers",
    "— Pelatihan": "— Training",
    "— Bakti masyarakat": "— Community service",
    "— Pameran / expo": "— Exhibitions / expos",
    "Pengaduan Website": "Website Complaint",
    "Melaporkan kendala teknis pada website.": "Report technical issues with the website.",
    "— Tidak bisa login": "— Cannot log in",
    "— Error sistem": "— System error",
    "— Data tidak muncul": "— Data not showing",
    "— Bug website": "— Website bug",
    "Kritik dan Saran": "Feedback and Suggestions",
    "Memberikan kritik, saran, maupun ide untuk peningkatan pelayanan dan kegiatan.": "Provide criticism, suggestions, or ideas to improve services and activities.",
    "— Ide kegiatan baru": "— New activity ideas",
    "— Masukan pelayanan": "— Service feedback",
    "— Evaluasi program": "— Program evaluation",
    "Pendaftaran Anggota Baru": "New Member Registration",
    "Ayo Gabung Bersama": "Join Together with",
    "Wujudkan minatmu di dunia penerbangan dan antariksa. Terbuka bagi Pramuka Penegak dan Pandega dari seluruh kabupaten/kota di Bali.": "Pursue your passion for aviation and space. Open to Penegak and Pandega Scouts from all regencies/cities in Bali.",
    "Daftar Sekarang": "Register Now",
    "Lihat Anggota Terdaftar": "View Registered Members",
    "Isi Formulir": "Fill Out the Form",
    "Lengkapi data diri singkat pada formulir pendaftaran di bawah.": "Complete a brief personal data form in the registration form below.",
    "Verifikasi Gudep": "Troop Verification",
    "Pengurus menghubungi melalui gugus depan/sekolah untuk konfirmasi data.": "Administrators will reach out through your scout troop (gugus depan)/school to confirm your data.",
    "Orientasi Anggota": "Member Orientation",
    "Mengikuti sesi pengenalan Saka Dirgantara dan pemilihan krida.": "Attend an introduction session on Saka Dirgantara and choose your krida.",
    "Aktif Berlatih": "Active Training",
    "Resmi tergabung dan mengikuti latihan rutin setiap Sabtu.": "Officially joined and taking part in regular training every Saturday.",
    "Syarat Pendaftaran": "Registration Requirements",
    "Siapa yang Bisa Bergabung?": "Who Can Join?",
    "Anggota Gerakan Pramuka aktif berstatus Penegak atau Pandega.": "An active Scout Movement member with Penegak or Pandega status.",
    "Mendapat izin/rekomendasi dari Gugus Depan (Gudep) asal sekolah.": "Has permission/recommendation from the school's scout troop (Gugus Depan/Gudep).",
    "Sehat jasmani dan rohani, serta bersedia mengikuti latihan rutin.": "Physically and mentally healthy, and willing to take part in regular training.",
    "Memiliki minat di bidang penerbangan, antariksa, atau kedirgantaraan.": "Has an interest in aviation, space, or aerospace.",
    "Bersedia mematuhi Satya dan Darma Pramuka serta tata tertib Saka.": "Willing to abide by the Scout Promise (Satya) and Scout Law (Darma) as well as Saka rules.",
    "Latihan rutin dilaksanakan setiap Sabtu, 14.00–17.00 WITA, di masing-masing pangkalan terdekat.": "Regular training is held every Saturday, 2:00–5:00 PM WITA, at the nearest base.",
    "Formulir Pendaftaran": "Registration Form",
    "Daftar Sebagai Calon Anggota": "Register as a Prospective Member",
    "Formulir contoh — tuliskan nama pangkalan/asal sekolahmu, data akan diteruskan ke sana.": "Sample form — enter the name of your base/school; your data will be forwarded there.",
    "Pangkalan / Asal Sekolah": "Base / School of Origin",
    "Minat Krida": "Krida Interest",
    "Kirim Pendaftaran": "Submit Registration",
    "Pendaftaran Terkirim!": "Registration Sent!",
    "Pengurus pangkalan akan menghubungi kamu melalui WhatsApp untuk proses selanjutnya. Selamat datang calon anggota Saka Dirgantara!": "The base administrators will contact you via WhatsApp for the next steps. Welcome, prospective member of Saka Dirgantara!",
    "Pengurus pangkalan akan menghubungi kamu melalui WhatsApp untuk proses selanjutnya. Konfirmasi beserta kode pendaftaran ini juga telah dikirim ke email kamu.": "The base administrators will contact you via WhatsApp for the next steps. A confirmation with this registration code has also been sent to your email.",
    "Daftar Lagi": "Register Again",
    "Hubungi Saka Dirgantara Bali": "Contact Saka Dirgantara Bali",
    "Saka Dirgantara Kwartir Daerah Bali aktif di sepuluh pangkalan yang tersebar dari Jembrana hingga Karangasem, menjangkau anggota dari seluruh kabupaten dan kota di Bali.": "Saka Dirgantara Bali Regional Branch is active at ten bases spread from Jembrana to Karangasem, reaching members from all regencies and cities in Bali.",
    "Untuk informasi pendaftaran, jadwal latihan, atau kerja sama kegiatan, silakan hubungi sekretariat melalui kontak di samping — atau langsung isi formulir pada halaman Ayo Gabung.": "For information on registration, training schedules, or activity partnerships, please contact the secretariat through the contact details beside this text — or fill out the form on the Join Us page.",
    "Sekretariat": "Secretariat",
    "Markas komandon TNI AU I Gusti Ngurah Rai Bali, badung": "TNI AU Command Headquarters (Mako), I Gusti Ngurah Rai, Bali, Badung",
    "Media Sosial": "Social Media",
    "@sakadirgantarabali (contoh)": "@sakadirgantarabali (example)",
    "Jam Latihan": "Training Hours",
    "Setiap Sabtu, 14.00–17.00 WITA, di mako tni au lanud i gusti ngurah rai bali": "Every Saturday, 2:00–5:00 PM WITA, at the TNI AU Headquarters (Mako), I Gusti Ngurah Rai Air Force Base, Bali",
    "Kwartir Daerah Bali": "Bali Regional Branch",
    "Wadah pendidikan dan pembinaan kedirgantaraan bagi Pramuka Penegak dan Pandega, Melalui pembinaan bersama TNI Angkatan Udara dan dukungan berbagai mitra di bidang penerbangan.": "An aerospace education and training platform for Penegak and Pandega Scouts, through guidance together with the Indonesian Air Force and the support of various aviation partners.",
    "Navigasi": "Navigation",
    "Organisasi": "Organization",
    "Ayo Gabung": "Join Us",
    "Krida & SKK": "Krida & SKK",
    "Kwarda Bali": "Bali Regional Branch (Kwarda)",
    "Alamat": "Address",
    "Sabtu, 14.00–17.00 WITA": "Saturday, 2:00–5:00 PM WITA",
    "© 2026 Saka Dirgantara — Lanud I Gusti Ngurah Rai. Seluruh hak cipta dilindungi.": "© 2026 Saka Dirgantara — I Gusti Ngurah Rai Air Force Base. All rights reserved.",
    "Login Admin": "Admin Login",
    "Mengirim...": "Sending...",
    "Terjadi kesalahan, silakan coba lagi.": "An error occurred, please try again.",
    "Laporan berhasil dikirim": "Report submitted successfully",
    "Mencari data laporan…": "Searching for report data…",
    "Logo Saka": "Saka logo",
    "Cari nama, angkatan, pangkalan, sertifikasi, jabatan…": "Search name, cohort, base, certification, position…",
    "Nama sesuai identitas": "Name as on your ID",
    "Opsional": "Optional",
    "Contoh: Denpasar": "Example: Denpasar",
    "Ringkasan singkat laporan": "Brief summary of the report",
    "Jelaskan kronologi dan detail laporan Anda": "Describe the chronology and details of your report",
    "Contoh: Sekitar Bandara Ngurah Rai": "Example: Near Ngurah Rai Airport",
    "Contoh: LAP-2026-0001": "Example: LAP-2026-0001",
    "Contoh: Pangkalan SMAN 1 Denpasar": "Example: SMAN 1 Denpasar Base",
    "Buka alat bantu aksesibilitas": "Open accessibility tools",
    "Alat Bantu Aksesibilitas": "Accessibility Tools",
    "Tutup alat bantu aksesibilitas": "Close accessibility tools"
  };

  var MONTHS = {
    Januari: 'January', Februari: 'February', Maret: 'March', April: 'April',
    Mei: 'May', Juni: 'June', Juli: 'July', Agustus: 'August',
    September: 'September', Oktober: 'October', November: 'November', Desember: 'December'
  };
  var MONTH_RE = '(Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember)';
  var KRIDA_SHORT = { Ordirga: 'Aerospace Sports', Jasa: 'Services', Pengetahuan: 'Knowledge' };

  function monthify(s) {
    return s.replace(new RegExp(MONTH_RE, 'g'), function (m) { return MONTHS[m]; });
  }
  function hasOwn(o, k) { return Object.prototype.hasOwnProperty.call(o, k); }

  /* Teks yang mengandung angka/nama dinamis (hasil render JavaScript halaman). */
  var PATTERNS = [
    [/^(\d+) dari (\d+) anggota ditemukan$/, function (m) { return m[1] + ' of ' + m[2] + ' members found'; }],
    [/^(\d+) anggota$/, function (m) { return m[1] + (m[1] === '1' ? ' member' : ' members'); }],
    [/^(\d+) Pangkalan$/, function (m) { return m[1] + (m[1] === '1' ? ' Base' : ' Bases'); }],
    [/^Oleh (.+)$/, function (m) { return 'By ' + m[1]; }],
    [/^(.+) · (\d+) aktif \/ (\d+) total$/, function (m) { return m[1] + ' · ' + m[2] + ' active / ' + m[3] + ' total'; }],
    [/^• (.+) — (Aktif|Tidak Aktif)$/, function (m) { return '• ' + m[1] + ' — ' + (m[2] === 'Aktif' ? 'Active' : 'Inactive'); }],
    [new RegExp('^\\d{1,2} ' + MONTH_RE + ' \\d{4}$'), function (m) { return monthify(m[0]); }],
    [/^(.+) · Diajukan (.+)$/, function (m) {
      var parts = m[1].split(' · ').map(function (p) { return hasOwn(DICT, p) ? DICT[p] : p; });
      return parts.join(' · ') + ' · Submitted ' + monthify(m[2]);
    }],
    [/^Data laporan dengan tiket\/email "([\s\S]*)" tidak ditemukan\. Periksa kembali nomor tiket atau email yang digunakan saat mengajukan laporan\.$/,
      function (m) { return 'No report was found for ticket/email "' + m[1] + '". Please check the ticket number or email you used when submitting the report.'; }],
    [/^Angkatan ([IVXLC]+) \((\d{4})\)$/, function (m) { return 'Cohort ' + m[1] + ' (' + m[2] + ')'; }],
    [/^SKK (Ordirga|Jasa|Pengetahuan)(?: — (.+))?$/, function (m) {
      return 'SKK ' + KRIDA_SHORT[m[1]] + (m[2] ? ' — ' + m[2] : '');
    }]
  ];

  /* Kamus balik (EN -> ID), hanya untuk entri yang tidak ambigu. */
  var REV = {};
  Object.keys(DICT).forEach(function (id) {
    var en = DICT[id];
    if (en === id) return;
    REV[en] = hasOwn(REV, en) ? null : id;
  });

  function norm(s) { return s.replace(/\s+/g, ' ').trim(); }

  function translate(raw) {
    var k = norm(raw);
    if (!k) return null;
    if (hasOwn(DICT, k)) return DICT[k];
    for (var i = 0; i < PATTERNS.length; i++) {
      var m = PATTERNS[i][0].exec(k);
      if (m) return PATTERNS[i][1](m);
    }
    return null;
  }

  var lang = 'id';
  var records = new WeakMap();   // text node -> {o: teks asli, t: teks terjemahan}
  var observer = null;

  function wrapWhitespace(orig, text) {
    return orig.match(/^\s*/)[0] + text + orig.match(/\s*$/)[0];
  }

  function applyText(node) {
    var v = node.nodeValue;
    var rec = records.get(node);
    if (rec && rec.t === v) return;           // sudah diterjemahkan
    var t = translate(v);
    if (t === null) return;
    var out = wrapWhitespace(v, t);
    records.set(node, { o: v, t: out });
    node.nodeValue = out;
  }

  function restoreText(node) {
    var v = node.nodeValue;
    var rec = records.get(node);
    if (rec && rec.t === v) {
      node.nodeValue = rec.o;
    } else {
      var k = norm(v);                         // teks baru yang dibuat skrip halaman saat mode EN
      var p = node.parentNode;
      var inEnglishWidget = p && p.closest && p.closest('.a11y-panel');   // widget aksesibilitas memang sudah berbahasa Inggris
      if (k && !inEnglishWidget && hasOwn(REV, k) && REV[k]) node.nodeValue = wrapWhitespace(v, REV[k]);
    }
    records.delete(node);
  }

  function walkText(root, fn) {
    if (root.nodeType === 3) {
      if (!root.parentNode || !SKIP_TAGS[root.parentNode.nodeName]) fn(root);
      return;
    }
    if (root.nodeType !== 1 || SKIP_TAGS[root.nodeName]) return;
    var w = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
    var list = [], n;
    while ((n = w.nextNode())) {
      if (!SKIP_TAGS[n.parentNode.nodeName]) list.push(n);
    }
    list.forEach(fn);
  }

  function eachAttrEl(root, fn) {
    if (root.nodeType !== 1) return;
    var sel = ATTRS.map(function (a) { return '[' + a + ']'; }).join(',');
    if (root.matches && root.matches(sel)) fn(root);
    var els = root.querySelectorAll(sel);
    for (var i = 0; i < els.length; i++) fn(els[i]);
  }

  function applyAttrs(el) {
    ATTRS.forEach(function (a) {
      if (!el.hasAttribute(a)) return;
      var store = 'data-i18n-o-' + a;
      var cur = el.getAttribute(a);
      if (el.hasAttribute(store)) return;
      var t = translate(cur);
      if (t === null) return;
      el.setAttribute(store, cur);
      el.setAttribute(a, t);
    });
  }

  function restoreAttrs(el) {
    ATTRS.forEach(function (a) {
      var store = 'data-i18n-o-' + a;
      if (!el.hasAttribute(store)) return;
      el.setAttribute(a, el.getAttribute(store));
      el.removeAttribute(store);
    });
  }

  var titleOrig = document.title;

  function translateTree(root) {
    walkText(root, applyText);
    eachAttrEl(root, applyAttrs);
  }
  function restoreTree(root) {
    walkText(root, restoreText);
    eachAttrEl(root, restoreAttrs);
  }

  function startObserver() {
    if (!observer) {
      observer = new MutationObserver(function (muts) {
        if (lang !== 'en') return;
        observer.disconnect();
        muts.forEach(function (m) {
          if (m.type === 'childList') {
            for (var i = 0; i < m.addedNodes.length; i++) translateTree(m.addedNodes[i]);
          } else if (m.type === 'characterData') {
            walkText(m.target, applyText);
          } else if (m.type === 'attributes' && m.target.nodeType === 1) {
            applyAttrs(m.target);
          }
        });
        connect();
      });
    }
    connect();
  }
  function connect() {
    observer.observe(document.body, {
      childList: true, subtree: true, characterData: true,
      attributes: true, attributeFilter: ATTRS
    });
  }

  function syncSwitch() {
    var btns = document.querySelectorAll('.lang-switch [data-lang]');
    for (var i = 0; i < btns.length; i++) {
      var on = btns[i].getAttribute('data-lang') === lang;
      btns[i].classList.toggle('active', on);
      btns[i].setAttribute('aria-pressed', on ? 'true' : 'false');
    }
  }

  function setLang(next, persist) {
    next = next === 'en' ? 'en' : 'id';
    if (next === lang && persist === false) { syncSwitch(); return; }
    if (observer) observer.disconnect();
    if (next === 'en') {
      lang = 'en';
      translateTree(document.body);
      var tt = translate(titleOrig);
      if (tt !== null) document.title = tt;
      startObserver();
    } else {
      lang = 'id';
      restoreTree(document.body);
      document.title = titleOrig;
      if (observer) connect();
    }
    document.documentElement.setAttribute('lang', lang);
    syncSwitch();
    if (persist !== false) {
      try { localStorage.setItem(STORAGE_KEY, lang); } catch (e) { /* abaikan */ }
    }
  }

  document.querySelectorAll('.lang-switch [data-lang]').forEach(function (b) {
    b.addEventListener('click', function () { setLang(b.getAttribute('data-lang')); });
  });

  window.SakaI18n = { setLang: setLang, getLang: function () { return lang; } };

  /* Default selalu Indonesia; hanya pindah ke EN jika pengunjung pernah memilihnya. */
  var saved = null;
  try { saved = localStorage.getItem(STORAGE_KEY); } catch (e) { /* abaikan */ }
  syncSwitch();
  if (saved === 'en') setLang('en', false);
})();