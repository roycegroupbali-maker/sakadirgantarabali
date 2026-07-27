<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Pendaftaran Anggota Baru</title>
    <style>
        @page { margin: 24px 28px; }
        * { box-sizing: border-box; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #1e293b; font-size: 11px; }

        .header { margin-bottom: 14px; border-bottom: 2px solid #0284c7; padding-bottom: 10px; }
        .header h1 { margin: 0 0 2px; font-size: 16px; color: #0f172a; }
        .header p { margin: 0; font-size: 10px; color: #64748b; }

        .meta { margin-bottom: 12px; font-size: 10px; color: #475569; }
        .meta span { display: inline-block; margin-right: 18px; }

        table { width: 100%; border-collapse: collapse; }
        thead th {
            background-color: #0f172a;
            color: #ffffff;
            text-align: left;
            padding: 6px 6px;
            font-size: 9.5px;
            text-transform: uppercase;
        }
        tbody td {
            padding: 6px 6px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 10px;
            vertical-align: top;
        }
        tbody tr:nth-child(even) { background-color: #f8fafc; }

        .muted { color: #94a3b8; font-size: 9px; }
        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 8px;
            font-size: 9px;
        }
        .badge-menunggu { background-color: #fef3c7; color: #92400e; }
        .badge-dihubungi { background-color: #e0f2fe; color: #075985; }
        .badge-diterima { background-color: #d1fae5; color: #065f46; }
        .badge-ditolak { background-color: #fee2e2; color: #991b1b; }

        .footer { margin-top: 10px; text-align: right; font-size: 9px; color: #94a3b8; }
        .empty { text-align: center; padding: 24px 0; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Data Pendaftaran Anggota Baru</h1>
        <p>Saka Dirgantara &mdash; Diunduh pada <?php echo e(now()->translatedFormat('d F Y, H:i')); ?> WIB</p>
    </div>

    <div class="meta">
        <span><strong>Total data:</strong> <?php echo e($registrationList->count()); ?></span>
        <?php if($q): ?>
            <span><strong>Kata kunci:</strong> "<?php echo e($q); ?>"</span>
        <?php endif; ?>
        <?php if($status): ?>
            <span><strong>Status:</strong> <?php echo e($status); ?></span>
        <?php endif; ?>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th style="width: 12%;">Kode</th>
                <th style="width: 16%;">Nama &amp; Asal Sekolah</th>
                <th style="width: 18%;">Kontak</th>
                <th style="width: 14%;">Pangkalan Tujuan</th>
                <th style="width: 10%;">Krida</th>
                <th style="width: 12%;">Status</th>
                <th style="width: 14%;">Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $registrationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($i + 1); ?></td>
                    <td><?php echo e($registration->kode_pendaftaran); ?></td>
                    <td>
                        <?php echo e($registration->nama); ?><br>
                        <span class="muted"><?php echo e($registration->asal_sekolah); ?></span>
                    </td>
                    <td>
                        <?php echo e($registration->email); ?><br>
                        <span class="muted"><?php echo e($registration->no_hp); ?></span>
                    </td>
                    <td><?php echo e($registration->pangkalan?->nama ?? '-'); ?></td>
                    <td><?php echo e($registration->krida ?? '-'); ?></td>
                    <td>
                        <?php
                            $badgeClass = match ($registration->status) {
                                'Menunggu Verifikasi' => 'badge-menunggu',
                                'Dihubungi' => 'badge-dihubungi',
                                'Diterima' => 'badge-diterima',
                                'Ditolak' => 'badge-ditolak',
                                default => '',
                            };
                        ?>
                        <span class="badge <?php echo e($badgeClass); ?>"><?php echo e($registration->status); ?></span>
                    </td>
                    <td><?php echo e($registration->created_at->translatedFormat('d M Y, H:i')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="empty">Tidak ada data pendaftaran yang cocok dengan filter ini.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        Dokumen ini dibuat otomatis oleh Panel Admin Saka Dirgantara.
    </div>
</body>
</html>
<?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/pendaftaran/pdf.blade.php ENDPATH**/ ?>