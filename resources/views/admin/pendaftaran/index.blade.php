@extends('admin.layouts.app')

@section('title', 'Pendaftaran Anggota Baru')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-slate-800">{{ $stats['total'] }}</p>
            <p class="text-xs text-slate-500">Total Pendaftar</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-amber-600">{{ $stats['menunggu'] }}</p>
            <p class="text-xs text-slate-500">Menunggu Verifikasi</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-sky-600">{{ $stats['dihubungi'] }}</p>
            <p class="text-xs text-slate-500">Dihubungi</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-emerald-600">{{ $stats['diterima'] }}</p>
            <p class="text-xs text-slate-500">Diterima</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
        <form method="GET" class="flex flex-1 max-w-lg gap-2">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                    @include('admin.components.icon', ['name' => 'search'])
                </span>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama, kode, atau email..."
                       class="w-full rounded-lg border border-slate-300 pl-10 pr-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
            </div>
            <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Status</option>
                @foreach (\App\Models\Registration::STATUS_OPTIONS as $status)
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
                        <th class="px-4 py-3 font-medium">Kode</th>
                        <th class="px-4 py-3 font-medium">Nama</th>
                        <th class="px-4 py-3 font-medium">Kontak</th>
                        <th class="px-4 py-3 font-medium">Pangkalan Tujuan</th>
                        <th class="px-4 py-3 font-medium">Krida</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($registrationList as $registration)
                        <tr class="hover:bg-slate-50 align-top">
                            <td class="px-4 py-3 font-mono text-xs text-slate-500">
                                {{ $registration->kode_pendaftaran }}
                                <p class="mt-1 text-[11px] text-slate-400">{{ $registration->created_at->translatedFormat('d M Y, H:i') }}</p>
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-800">
                                {{ $registration->nama }}
                                <p class="mt-1 text-xs font-normal text-slate-400">{{ $registration->asal_sekolah }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-600">
                                <p>{{ $registration->email }}</p>
                                <p class="text-xs text-slate-400">{{ $registration->no_hp }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-600">{{ $registration->pangkalan?->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $registration->krida ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <form method="POST" action="{{ route('admin.pendaftaran.update', $registration) }}" class="flex flex-col gap-1">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                            class="text-xs rounded-lg border border-slate-300 px-2 py-1.5 focus:border-sky-500 focus:ring-sky-500">
                                        @foreach (\App\Models\Registration::STATUS_OPTIONS as $status)
                                            <option value="{{ $status }}" @selected($registration->status === $status)>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="px-4 py-3">
                                <form method="POST" action="{{ route('admin.pendaftaran.destroy', $registration) }}"
                                      onsubmit="return confirm('Hapus data pendaftaran ini?');" class="flex justify-end">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50" title="Hapus">
                                        @include('admin.components.icon', ['name' => 'trash'])
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-slate-400">Belum ada pendaftar yang masuk dari halaman "Ayo Gabung".</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($registrationList->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $registrationList->links() }}
            </div>
        @endif
    </div>
@endsection
