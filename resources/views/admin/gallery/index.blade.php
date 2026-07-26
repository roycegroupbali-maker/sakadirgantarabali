@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('content')
    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-slate-500">Kelola dokumentasi foto kegiatan.</p>
        <a href="{{ route('admin.gallery.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            @include('admin.components.icon', ['name' => 'plus'])
            Tambah Foto
        </a>
    </div>

    @if ($galleryList->isEmpty())
        <div class="bg-white rounded-xl border border-slate-200 p-10 text-center text-slate-400">
            Belum ada foto galeri. Klik "Tambah Foto" untuk mengunggah yang pertama.
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($galleryList as $item)
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden group">
                    <div class="aspect-square bg-slate-100">
                        <img src="{{ $item->foto_url }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <p class="text-sm font-medium text-slate-800 line-clamp-1">{{ $item->judul }}</p>
                        <p class="text-xs text-slate-400 mb-2">{{ $item->tanggal->format('d M Y') }}</p>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.gallery.edit', $item) }}"
                               class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-sky-50 text-sky-600 hover:bg-sky-100 text-xs font-medium py-1.5" title="Edit">
                                @include('admin.components.icon', ['name' => 'pencil'])
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $item) }}"
                                  onsubmit="return confirm('Hapus foto ini?');" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full inline-flex items-center justify-center gap-1 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 text-xs font-medium py-1.5" title="Hapus">
                                    @include('admin.components.icon', ['name' => 'trash'])
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($galleryList->hasPages())
            <div class="mt-6">
                {{ $galleryList->links() }}
            </div>
        @endif
    @endif
@endsection
