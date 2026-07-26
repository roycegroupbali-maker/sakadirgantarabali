@extends('admin.layouts.app')

@section('title', 'Aspirasi & Laporan')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-slate-800">{{ $stats['total'] }}</p>
            <p class="text-xs text-slate-500">Total Laporan</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-amber-600">{{ $stats['menunggu'] }}</p>
            <p class="text-xs text-slate-500">Menunggu Verifikasi</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-sky-600">{{ $stats['diproses'] }}</p>
            <p class="text-xs text-slate-500">Diproses</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-emerald-600">{{ $stats['selesai'] }}</p>
            <p class="text-xs text-slate-500">Selesai</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
        <form method="GET" class="flex flex-1 flex-wrap max-w-2xl gap-2">
            <div class="relative flex-1 min-w-[180px]">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                    @include('admin.components.icon', ['name' => 'search'])
                </span>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama, judul, atau tiket..."
                       class="w-full rounded-lg border border-slate-300 pl-10 pr-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
            </div>
            <select name="kategori" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Kategori</option>
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori }}" @selected(request('kategori') === $kategori)>{{ $kategori }}</option>
                @endforeach
            </select>
            <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Status</option>
                @foreach (\App\Models\Aspiration::STATUS_OPTIONS as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 px-3 py-2 text-sm">Cari</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Tiket</th>
                        <th class="px-4 py-3 font-medium">Laporan</th>
                        <th class="px-4 py-3 font-medium">Kategori</th>
                        <th class="px-4 py-3 font-medium">Kerahasiaan</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($aspirationList as $aspiration)
                        <tr class="hover:bg-slate-50 align-top">
                            <td class="px-4 py-3 font-mono text-xs text-slate-500">
                                {{ $aspiration->nomor_tiket }}
                                <p class="mt-1 text-[11px] text-slate-400">{{ $aspiration->created_at->translatedFormat('d M Y') }}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-800">{{ $aspiration->judul }}</p>
                                <p class="text-xs text-slate-400">{{ $aspiration->nama_publik }} · {{ $aspiration->kota }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-600">{{ $aspiration->kategori }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $aspiration->kerahasiaan === 'Publik' ? 'bg-slate-100 text-slate-600' : ($aspiration->kerahasiaan === 'Rahasia' ? 'bg-amber-100 text-amber-700' : 'bg-violet-100 text-violet-700') }}">
                                    {{ $aspiration->kerahasiaan }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ match(true) {
                                        $aspiration->status === 'Selesai' => 'bg-emerald-100 text-emerald-700',
                                        $aspiration->status === 'Ditolak' => 'bg-red-100 text-red-700',
                                        $aspiration->status === 'Menunggu Verifikasi' => 'bg-amber-100 text-amber-700',
                                        default => 'bg-sky-100 text-sky-700',
                                    } }}">
                                    {{ $aspiration->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.aspirasi.show', $aspiration) }}"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Lihat Detail">
                                        @include('admin.components.icon', ['name' => 'eye'])
                                    </a>
                                    <form method="POST" action="{{ route('admin.aspirasi.destroy', $aspiration) }}"
                                          onsubmit="return confirm('Hapus laporan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50" title="Hapus">
                                            @include('admin.components.icon', ['name' => 'trash'])
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-slate-400">Belum ada laporan yang masuk dari halaman Layanan Aspirasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($aspirationList->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $aspirationList->links() }}
            </div>
        @endif
    </div>
@endsection
