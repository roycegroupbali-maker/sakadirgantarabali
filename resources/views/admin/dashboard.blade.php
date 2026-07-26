@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center">
                @include('admin.components.icon', ['name' => 'newspaper'])
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-800">{{ $stats['total_berita'] }}</p>
                <p class="text-sm text-slate-500">Total Berita</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-violet-100 text-violet-600 flex items-center justify-center">
                @include('admin.components.icon', ['name' => 'photo'])
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-800">{{ $stats['total_galeri'] }}</p>
                <p class="text-sm text-slate-500">Total Galeri</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                @include('admin.components.icon', ['name' => 'users'])
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-800">{{ $stats['total_anggota'] }}</p>
                <p class="text-sm text-slate-500">Total Anggota</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-slate-800">Berita Terbaru</h3>
                <a href="{{ route('admin.news.index') }}" class="text-sm text-sky-600 hover:underline">Lihat semua</a>
            </div>
            @if ($beritaTerbaru->isEmpty())
                <p class="text-sm text-slate-400">Belum ada berita.</p>
            @else
                <ul class="divide-y divide-slate-100">
                    @foreach ($beritaTerbaru as $berita)
                        <li class="py-2.5 flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-slate-700 truncate">{{ $berita->judul }}</p>
                                <p class="text-xs text-slate-400">{{ $berita->tanggal_publish->format('d M Y') }} &middot; {{ $berita->penulis }}</p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full {{ $berita->status === 'publish' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ ucfirst($berita->status) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-slate-800">Anggota Terbaru</h3>
                <a href="{{ route('admin.members.index') }}" class="text-sm text-sky-600 hover:underline">Lihat semua</a>
            </div>
            @if ($anggotaTerbaru->isEmpty())
                <p class="text-sm text-slate-400">Belum ada data anggota.</p>
            @else
                <ul class="divide-y divide-slate-100">
                    @foreach ($anggotaTerbaru as $anggota)
                        <li class="py-2.5 flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-slate-700 truncate">{{ $anggota->nama }}</p>
                                <p class="text-xs text-slate-400">{{ $anggota->nomor_anggota }} &middot; {{ $anggota->krida ?? '-' }}</p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $anggota->status === 'Aktif' ? 'bg-emerald-100 text-emerald-700' : ($anggota->status === 'Alumni' ? 'bg-sky-100 text-sky-700' : 'bg-slate-100 text-slate-500') }}">
                                {{ $anggota->status }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
