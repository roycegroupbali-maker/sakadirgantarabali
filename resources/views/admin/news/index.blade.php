@extends('admin.layouts.app')

@section('title', 'Dirga News')

@section('content')
    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-slate-500">Kelola berita dan artikel Dirga News.</p>
        <a href="{{ route('admin.news.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            @include('admin.components.icon', ['name' => 'plus'])
            Tambah Berita
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Thumbnail</th>
                        <th class="px-4 py-3 font-medium">Judul</th>
                        <th class="px-4 py-3 font-medium">Penulis</th>
                        <th class="px-4 py-3 font-medium">Tanggal Publish</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($newsList as $news)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">
                                @if ($news->thumbnail)
                                    <img src="{{ $news->thumbnail_url }}" alt="{{ $news->judul }}" class="w-14 h-14 rounded-lg object-cover">
                                @else
                                    <div class="w-14 h-14 rounded-lg bg-slate-100 flex items-center justify-center text-slate-300">
                                        @include('admin.components.icon', ['name' => 'photo'])
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 max-w-xs">
                                <p class="font-medium text-slate-800 line-clamp-2">{{ $news->judul }}</p>
                                <p class="text-xs text-slate-400">/{{ $news->slug }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-600">{{ $news->penulis }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $news->tanggal_publish->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full {{ $news->status === 'publish' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ ucfirst($news->status) }}
                                </span>
                                @if ($news->status !== 'publish')
                                    <p class="mt-1 text-[11px] text-amber-600">Belum tampil di website publik</p>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.news.edit', $news) }}"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Edit">
                                        @include('admin.components.icon', ['name' => 'pencil'])
                                    </a>
                                    <form method="POST" action="{{ route('admin.news.destroy', $news) }}"
                                          onsubmit="return confirm('Hapus berita ini?');">
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
                            <td colspan="6" class="px-4 py-10 text-center text-slate-400">Belum ada berita. Klik "Tambah Berita" untuk membuat yang pertama.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($newsList->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $newsList->links() }}
            </div>
        @endif
    </div>
@endsection
