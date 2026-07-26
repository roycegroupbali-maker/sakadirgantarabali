@extends('admin.layouts.app')

@section('title', 'Data Anggota')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
        <form method="GET" class="flex flex-1 max-w-lg gap-2">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                    @include('admin.components.icon', ['name' => 'search'])
                </span>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau nomor anggota..."
                       class="w-full rounded-lg border border-slate-300 pl-10 pr-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
            </div>
            <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Status</option>
                @foreach (['Aktif', 'Alumni', 'Non Aktif'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 px-3 py-2 text-sm">Cari</button>
        </form>

        <a href="{{ route('admin.members.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            @include('admin.components.icon', ['name' => 'plus'])
            Tambah Anggota
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Foto</th>
                        <th class="px-4 py-3 font-medium">Nama</th>
                        <th class="px-4 py-3 font-medium">No. Anggota</th>
                        <th class="px-4 py-3 font-medium">Pangkalan</th>
                        <th class="px-4 py-3 font-medium">Krida</th>
                        <th class="px-4 py-3 font-medium">Jabatan</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($memberList as $member)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">
                                @if ($member->foto)
                                    <img src="{{ $member->foto_url }}" alt="{{ $member->nama }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-300">
                                        @include('admin.components.icon', ['name' => 'users'])
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-800">{{ $member->nama }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $member->nomor_anggota }}</td>
                            <td class="px-4 py-3 text-slate-600">
                                {{ $member->pangkalan?->nama ?? '-' }}
                                @unless ($member->pangkalan_id)
                                    <p class="mt-1 text-[11px] text-amber-600">Belum tampil di website (pilih Pangkalan)</p>
                                @endunless
                            </td>
                            <td class="px-4 py-3 text-slate-600">{{ $member->krida ?? '-' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $member->jabatan ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $member->status === 'Aktif' ? 'bg-emerald-100 text-emerald-700' : ($member->status === 'Alumni' ? 'bg-sky-100 text-sky-700' : 'bg-slate-100 text-slate-500') }}">
                                    {{ $member->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.members.edit', $member) }}"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Edit">
                                        @include('admin.components.icon', ['name' => 'pencil'])
                                    </a>
                                    <form method="POST" action="{{ route('admin.members.destroy', $member) }}"
                                          onsubmit="return confirm('Hapus anggota ini?');">
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
                            <td colspan="8" class="px-4 py-10 text-center text-slate-400">Tidak ada data anggota yang cocok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($memberList->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $memberList->links() }}
            </div>
        @endif
    </div>
@endsection
