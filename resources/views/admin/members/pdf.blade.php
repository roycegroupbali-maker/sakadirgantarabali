<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Anggota</title>
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
        .badge-aktif { background-color: #d1fae5; color: #065f46; }
        .badge-alumni { background-color: #e0f2fe; color: #075985; }
        .badge-nonaktif { background-color: #f1f5f9; color: #475569; }

        .footer { margin-top: 10px; text-align: right; font-size: 9px; color: #94a3b8; }
        .empty { text-align: center; padding: 24px 0; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Data Anggota</h1>
        <p>Saka Dirgantara &mdash; Diunduh pada {{ now()->translatedFormat('d F Y, H:i') }} WIB</p>
    </div>

    <div class="meta">
        <span><strong>Total data:</strong> {{ $memberList->count() }}</span>
        @if ($q)
            <span><strong>Kata kunci:</strong> "{{ $q }}"</span>
        @endif
        @if ($status)
            <span><strong>Status:</strong> {{ $status }}</span>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th style="width: 16%;">Nama</th>
                <th style="width: 10%;">No. Anggota</th>
                <th style="width: 14%;">Pangkalan</th>
                <th style="width: 9%;">Krida</th>
                <th style="width: 10%;">Jabatan</th>
                <th style="width: 9%;">Jenjang</th>
                <th style="width: 12%;">Kontak</th>
                <th style="width: 8%;">Angkatan</th>
                <th style="width: 8%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($memberList as $i => $member)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nomor_anggota }}</td>
                    <td>{{ $member->pangkalan?->nama ?? '-' }}</td>
                    <td>{{ $member->krida ?? '-' }}</td>
                    <td>{{ $member->jabatan ?? '-' }}</td>
                    <td>{{ $member->jenjang ?? '-' }}</td>
                    <td>
                        {{ $member->email ?? '-' }}<br>
                        <span class="muted">{{ $member->no_hp ?? '-' }}</span>
                    </td>
                    <td>{{ $member->angkatan ?? '-' }}</td>
                    <td>
                        @php
                            $badgeClass = match ($member->status) {
                                'Aktif' => 'badge-aktif',
                                'Alumni' => 'badge-alumni',
                                default => 'badge-nonaktif',
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $member->status }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="empty">Tidak ada data anggota yang cocok dengan filter ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dokumen ini dibuat otomatis oleh Panel Admin Saka Dirgantara.
    </div>
</body>
</html>
