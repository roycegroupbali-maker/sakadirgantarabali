<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pendaftaran Baru Masuk</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,Helvetica,sans-serif;color:#1e293b;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:32px 0;">
<tr><td align="center">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e2e8f0;">
<tr>
<td style="background:#0b2545;padding:24px 32px;">
<span style="color:#facc15;font-weight:bold;font-size:13px;letter-spacing:1px;">SAKA DIRGANTARA — PANEL ADMIN</span>
</td>
</tr>
<tr>
<td style="padding:32px;">
<h2 style="margin:0 0 4px;font-size:20px;color:#0b2545;">Ada Pendaftaran Anggota Baru 🔔</h2>
<p style="margin:0 0 20px;font-size:14px;color:#64748b;">Seorang calon anggota baru saja mengirimkan formulir pendaftaran melalui website.</p>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border:1px dashed #cbd5e1;border-radius:8px;margin-bottom:20px;">
<tr><td style="padding:16px 20px;">
<p style="margin:0;font-size:12px;color:#64748b;">Kode Pendaftaran</p>
<p style="margin:2px 0 0;font-size:20px;font-weight:bold;color:#0b2545;letter-spacing:1px;"><?php echo e($registration->kode_pendaftaran); ?></p>
</td></tr>
</table>

<p style="margin:0 0 8px;font-size:14px;">Ringkasan data pendaftar:</p>
<table role="presentation" width="100%" cellpadding="6" cellspacing="0" style="font-size:13.5px;color:#334155;">
<tr><td style="width:150px;color:#64748b;">Nama</td><td><?php echo e($registration->nama); ?></td></tr>
<tr><td style="color:#64748b;">Email</td><td><?php echo e($registration->email); ?></td></tr>
<tr><td style="color:#64748b;">Nomor WhatsApp</td><td><?php echo e($registration->no_hp); ?></td></tr>
<tr><td style="color:#64748b;">Asal Sekolah/Gudep</td><td><?php echo e($registration->asal_sekolah); ?></td></tr>
<tr><td style="color:#64748b;">Pangkalan Tujuan</td><td><?php echo e($registration->pangkalan?->nama ?? '-'); ?></td></tr>
<tr><td style="color:#64748b;">Minat Krida</td><td><?php echo e($registration->krida ?? '-'); ?></td></tr>
<tr><td style="color:#64748b;">Status</td><td><?php echo e($registration->status); ?></td></tr>
</table>

<div style="margin:24px 0 0;text-align:center;">
<a href="<?php echo e(route('admin.pendaftaran.index')); ?>" style="display:inline-block;background:#0b2545;color:#facc15;font-weight:bold;font-size:13.5px;text-decoration:none;padding:12px 24px;border-radius:8px;">Buka Panel Pendaftaran</a>
</div>

<p style="margin:20px 0 0;font-size:13.5px;color:#334155;">Mohon segera diverifikasi agar calon anggota dapat diproses lebih lanjut.</p>
<p style="margin:16px 0 0;font-size:12px;color:#94a3b8;">Email ini dikirim otomatis oleh sistem, mohon tidak membalas ke alamat ini.</p>
</td>
</tr>
</table>
</td></tr>
</table>
</body>
</html>
<?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/emails/admin/new-registration.blade.php ENDPATH**/ ?>