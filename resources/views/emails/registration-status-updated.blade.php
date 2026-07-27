<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Update Status Pendaftaran</title>
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
<h2 style="margin:0 0 4px;font-size:20px;color:#0b2545;">Status Pendaftaran Anda Diperbarui</h2>
<p style="margin:0 0 20px;font-size:14px;color:#64748b;">Ada pembaruan status untuk pendaftaran Anda sebagai calon anggota Saka Dirgantara Bali.</p>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border:1px dashed #cbd5e1;border-radius:8px;margin-bottom:20px;">
<tr><td style="padding:16px 20px;">
<p style="margin:0;font-size:12px;color:#64748b;">Kode Pendaftaran</p>
<p style="margin:2px 0 0;font-size:20px;font-weight:bold;color:#0b2545;letter-spacing:1px;">{{ $registration->kode_pendaftaran }}</p>
</td></tr>
</table>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
<tr>
<td align="center" style="padding:10px 16px;background:#f1f5f9;border-radius:8px;font-size:13px;color:#64748b;">{{ $statusSebelumnya }}</td>
<td align="center" style="padding:0 12px;font-size:16px;color:#94a3b8;">→</td>
<td align="center" style="padding:10px 16px;background:#0b2545;border-radius:8px;font-size:13px;color:#facc15;font-weight:bold;">{{ $registration->status }}</td>
</tr>
</table>

@if(filled($registration->catatan_admin))
<p style="margin:0 0 8px;font-size:14px;">Catatan dari Admin:</p>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border-left:3px solid #0b2545;border-radius:4px;margin-bottom:20px;">
<tr><td style="padding:12px 16px;font-size:13.5px;color:#334155;">{{ $registration->catatan_admin }}</td></tr>
</table>
@endif

<p style="margin:0 0 8px;font-size:14px;">Ringkasan data pendaftaran Anda:</p>
<table role="presentation" width="100%" cellpadding="6" cellspacing="0" style="font-size:13.5px;color:#334155;">
<tr><td style="width:150px;color:#64748b;">Nama</td><td>{{ $registration->nama }}</td></tr>
<tr><td style="color:#64748b;">Pangkalan Tujuan</td><td>{{ $registration->pangkalan?->nama ?? '-' }}</td></tr>
<tr><td style="color:#64748b;">Status Saat Ini</td><td>{{ $registration->status }}</td></tr>
</table>

<p style="margin:20px 0 0;font-size:13.5px;color:#334155;">
@if($registration->status === 'Diterima')
Selamat! Silakan tunggu informasi lebih lanjut dari pengurus pangkalan melalui WhatsApp untuk proses orientasi anggota.
@elseif($registration->status === 'Ditolak')
Untuk informasi lebih lanjut mengenai keputusan ini, silakan hubungi pengurus pangkalan tujuan Anda.
@else
Pengurus pangkalan tujuan akan menghubungi Anda melalui WhatsApp untuk informasi lebih lanjut.
@endif
</p>
<p style="margin:16px 0 0;font-size:12px;color:#94a3b8;">Email ini dikirim otomatis, mohon tidak membalas ke alamat ini.</p>
</td>
</tr>
</table>
</td></tr>
</table>
</body>
</html>
