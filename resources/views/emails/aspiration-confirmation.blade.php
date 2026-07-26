<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Konfirmasi Laporan</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,Helvetica,sans-serif;color:#1e293b;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:32px 0;">
<tr><td align="center">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e2e8f0;">
<tr>
<td style="background:#0b2545;padding:24px 32px;">
<span style="color:#facc15;font-weight:bold;font-size:13px;letter-spacing:1px;">SAKA DIRGANTARA — KWARTIR DAERAH BALI</span>
</td>
</tr>
<tr>
<td style="padding:32px;">
<h2 style="margin:0 0 4px;font-size:20px;color:#0b2545;">Laporan Anda Berhasil Diterima</h2>
<p style="margin:0 0 20px;font-size:14px;color:#64748b;">Simpan nomor tiket berikut untuk memeriksa status laporan Anda kapan saja.</p>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border:1px dashed #cbd5e1;border-radius:8px;margin-bottom:20px;">
<tr><td style="padding:16px 20px;">
<p style="margin:0;font-size:12px;color:#64748b;">Nomor Tiket</p>
<p style="margin:2px 0 0;font-size:20px;font-weight:bold;color:#0b2545;letter-spacing:1px;">{{ $aspiration->nomor_tiket }}</p>
</td></tr>
</table>

<p style="margin:0 0 8px;font-size:14px;">Ringkasan laporan Anda:</p>
<table role="presentation" width="100%" cellpadding="6" cellspacing="0" style="font-size:13.5px;color:#334155;">
<tr><td style="width:150px;color:#64748b;">Kategori</td><td>{{ $aspiration->kategori }}</td></tr>
<tr><td style="color:#64748b;">Judul</td><td>{{ $aspiration->judul }}</td></tr>
<tr><td style="color:#64748b;">Lokasi</td><td>{{ $aspiration->lokasi_kejadian }}</td></tr>
<tr><td style="color:#64748b;">Tanggal Kejadian</td><td>{{ optional($aspiration->tanggal_kejadian)->translatedFormat('d M Y') }}</td></tr>
<tr><td style="color:#64748b;">Tingkat Kerahasiaan</td><td>{{ $aspiration->kerahasiaan }}</td></tr>
<tr><td style="color:#64748b;">Status Saat Ini</td><td>{{ $aspiration->status }}</td></tr>
</table>

<p style="margin:20px 0 0;font-size:13.5px;color:#334155;">Laporan Anda akan diverifikasi terlebih dahulu oleh Admin Saka Dirgantara. Anda dapat melacak perkembangan laporan kapan saja melalui menu <b>Layanan Aspirasi → Cek Status Laporan</b> di website, menggunakan nomor tiket atau email ini.</p>
<p style="margin:16px 0 0;font-size:12px;color:#94a3b8;">Email ini dikirim otomatis, mohon tidak membalas ke alamat ini.</p>
</td>
</tr>
</table>
</td></tr>
</table>
</body>
</html>
