@extends('admin.layouts.app')

@section('title', 'Detail Laporan — '.$aspiration->nomor_tiket)

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.aspirasi.index') }}" class="text-sm text-sky-600 hover:underline">&larr; Kembali ke daftar laporan</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                        <p class="font-mono text-xs text-slate-400 mb-1">{{ $aspiration->nomor_tiket }}</p>
                        <h2 class="text-lg font-semibold text-slate-800">{{ $aspiration->judul }}</h2>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        {{ match(true) {
                            $aspiration->status === 'Selesai' => 'bg-emerald-100 text-emerald-700',
                            $aspiration->status === 'Ditolak' => 'bg-red-100 text-red-700',
                            $aspiration->status === 'Menunggu Verifikasi' => 'bg-amber-100 text-amber-700',
                            default => 'bg-sky-100 text-sky-700',
                        } }}">
                        {{ $aspiration->status }}
                    </span>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm mb-5">
                    <div>
                        <dt class="text-slate-400 text-xs">Pelapor</dt>
                        <dd class="text-slate-700 font-medium">{{ $aspiration->nama_publik }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Tingkat Kerahasiaan</dt>
                        <dd class="text-slate-700 font-medium">{{ $aspiration->kerahasiaan }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Email</dt>
                        <dd class="text-slate-700">{{ $aspiration->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Nomor WhatsApp</dt>
                        <dd class="text-slate-700">{{ $aspiration->no_hp }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Instansi/Sekolah</dt>
                        <dd class="text-slate-700">{{ $aspiration->instansi ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Kota/Kabupaten</dt>
                        <dd class="text-slate-700">{{ $aspiration->kota }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Kategori</dt>
                        <dd class="text-slate-700">{{ $aspiration->kategori }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Lokasi Kejadian</dt>
                        <dd class="text-slate-700">{{ $aspiration->lokasi_kejadian }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Tanggal / Jam Kejadian</dt>
                        <dd class="text-slate-700">{{ $aspiration->tanggal_kejadian->translatedFormat('d M Y') }}{{ $aspiration->jam_kejadian ? ' · '.$aspiration->jam_kejadian : '' }}</dd>
                    </div>
                </dl>

                <div class="mb-5">
                    <dt class="text-slate-400 text-xs mb-1">Deskripsi Lengkap</dt>
                    <dd class="text-slate-700 text-sm whitespace-pre-line bg-slate-50 rounded-lg p-4 border border-slate-100">{{ $aspiration->deskripsi }}</dd>
                </div>

                @if (!empty($aspiration->lampiran_urls))
                    <div>
                        <dt class="text-slate-400 text-xs mb-2">File Pendukung</dt>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($aspiration->lampiran_urls as $url)
                                <a href="{{ $url }}" target="_blank"
                                   class="text-xs px-3 py-1.5 rounded-lg bg-sky-50 text-sky-700 hover:bg-sky-100 border border-sky-100">
                                    Lampiran {{ $loop->iteration }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h3 class="text-sm font-semibold text-slate-700 mb-4">Riwayat / Timeline</h3>
                <div class="space-y-4">
                    @forelse (($aspiration->riwayat ?? []) as $item)
                        <div class="flex gap-3">
                            <div class="w-2 h-2 mt-1.5 rounded-full bg-sky-500 flex-shrink-0"></div>
                            <div>
                                <p class="text-sm text-slate-700">{{ $item['catatan'] }}</p>
                                <p class="text-xs text-slate-400">{{ $item['tanggal'] }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-400">Belum ada riwayat.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h3 class="text-sm font-semibold text-slate-700 mb-4">Perbarui Status</h3>
                <form method="POST" action="{{ route('admin.aspirasi.update', $aspiration) }}" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="status" class="block text-xs font-medium text-slate-500 mb-1">Status Laporan</label>
                        <select id="status" name="status" required
                                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                            @foreach (\App\Models\Aspiration::STATUS_OPTIONS as $status)
                                <option value="{{ $status }}" @selected($aspiration->status === $status)>{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="catatan" class="block text-xs font-medium text-slate-500 mb-1">Catatan (opsional)</label>
                        <textarea id="catatan" name="catatan" rows="3" placeholder="Contoh: Diteruskan ke AirNav Indonesia"
                                  class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                        @error('catatan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        <p class="mt-1 text-xs text-slate-400">Catatan akan ditambahkan ke riwayat/timeline dan dapat dilihat pelapor pada halaman "Cek Status Laporan".</p>
                    </div>
                    <button type="submit"
                            class="w-full rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
