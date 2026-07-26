@extends('admin.layouts.app')

@section('title', 'Pangkalan')

@section('content')
    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-slate-500">Kelola daftar pangkalan beserta titik lokasinya di peta sebaran.</p>
        <a href="{{ route('admin.pangkalan.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            @include('admin.components.icon', ['name' => 'plus'])
            Tambah Pangkalan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Nama Pangkalan</th>
                        <th class="px-4 py-3 font-medium">Kota/Kabupaten</th>
                        <th class="px-4 py-3 font-medium">Koordinat (Lat, Lng)</th>
                        <th class="px-4 py-3 font-medium">Jumlah Anggota</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($pangkalanList as $item)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-medium text-slate-800">{{ $item->nama }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $item->kota }}</td>
                            <td class="px-4 py-3 text-slate-500 font-mono text-xs">{{ $item->lat }}, {{ $item->lng }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $item->members_count }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.pangkalan.edit', $item) }}"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Edit">
                                        @include('admin.components.icon', ['name' => 'pencil'])
                                    </a>
                                    <form method="POST" action="{{ route('admin.pangkalan.destroy', $item) }}"
                                          onsubmit="return confirm('Hapus pangkalan ini?{{ $item->members_count > 0 ? ' '.$item->members_count.' anggota yang terdaftar di pangkalan ini akan kehilangan data pangkalannya.' : '' }}');">
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
                            <td colspan="5" class="px-4 py-10 text-center text-slate-400">Belum ada data pangkalan. Klik "Tambah Pangkalan" untuk menambahkan yang pertama.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($pangkalanList->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $pangkalanList->links() }}
            </div>
        @endif
    </div>
@endsection
