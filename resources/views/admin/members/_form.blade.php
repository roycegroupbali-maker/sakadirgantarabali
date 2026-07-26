@csrf
@if (isset($member))
    @method('PUT')
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="nama" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $member->nama ?? '') }}" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('nama') border-red-400 @enderror">
                @error('nama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="nomor_anggota" class="block text-sm font-medium text-slate-700 mb-1">Nomor Anggota</label>
                <input type="text" id="nomor_anggota" name="nomor_anggota" value="{{ old('nomor_anggota', $member->nomor_anggota ?? '') }}" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('nomor_anggota') border-red-400 @enderror">
                @error('nomor_anggota') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-slate-700 mb-1">Jenis Kelamin</label>
                @php $jk = old('jenis_kelamin', $member->jenis_kelamin ?? ''); @endphp
                <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('jenis_kelamin') border-red-400 @enderror">
                    <option value="" disabled @selected($jk === '')>Pilih jenis kelamin</option>
                    <option value="Laki-laki" @selected($jk === 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected($jk === 'Perempuan')>Perempuan</option>
                </select>
                @error('jenis_kelamin') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                @php $status = old('status', $member->status ?? 'Aktif'); @endphp
                <select id="status" name="status" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('status') border-red-400 @enderror">
                    <option value="Aktif" @selected($status === 'Aktif')>Aktif</option>
                    <option value="Alumni" @selected($status === 'Alumni')>Alumni</option>
                    <option value="Non Aktif" @selected($status === 'Non Aktif')>Non Aktif</option>
                </select>
                @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="tempat_lahir" class="block text-sm font-medium text-slate-700 mb-1">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $member->tempat_lahir ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('tempat_lahir') border-red-400 @enderror">
                @error('tempat_lahir') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Lahir</label>
                @php
                    $tglLahirVal = old('tanggal_lahir', isset($member) && $member->tanggal_lahir ? $member->tanggal_lahir->format('Y-m-d') : '');
                    [$tlTahun, $tlBulan, $tlTanggal] = $tglLahirVal ? explode('-', $tglLahirVal) : ['', '', ''];
                    $tlTahun = ltrim($tlTahun ?? '', '0') ?: $tlTahun;
                @endphp
                {{-- Sengaja pakai 3 dropdown terpisah (bukan <input type="date">) karena input
                     tanggal bawaan browser sering "nge-bug"/susah dipakai saat harus mundur
                     puluhan tahun ke tahun lahir. Nilai akhirnya digabung ke input tersembunyi
                     bernama tanggal_lahir dengan format Y-m-d, sama seperti sebelumnya. --}}
                <div class="grid grid-cols-3 gap-2">
                    <select id="tanggal_lahir_tgl" class="w-full rounded-lg border border-slate-300 px-2 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                        <option value="">Tgl</option>
                        @for ($d = 1; $d <= 31; $d++)
                            <option value="{{ sprintf('%02d', $d) }}" @selected((int) $tlTanggal === $d)>{{ $d }}</option>
                        @endfor
                    </select>
                    <select id="tanggal_lahir_bln" class="w-full rounded-lg border border-slate-300 px-2 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                        <option value="">Bulan</option>
                        @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bi => $bn)
                            <option value="{{ sprintf('%02d', $bi + 1) }}" @selected((int) $tlBulan === $bi + 1)>{{ $bn }}</option>
                        @endforeach
                    </select>
                    <select id="tanggal_lahir_thn" class="w-full rounded-lg border border-slate-300 px-2 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                        <option value="">Tahun</option>
                        @for ($y = now()->year; $y >= now()->year - 80; $y--)
                            <option value="{{ $y }}" @selected((string) $tlTahun === (string) $y)>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <input type="hidden" id="tanggal_lahir" name="tanggal_lahir" value="{{ $tglLahirVal }}">
                @error('tanggal_lahir') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="agama" class="block text-sm font-medium text-slate-700 mb-1">Agama</label>
                <input type="text" id="agama" name="agama" value="{{ old('agama', $member->agama ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('agama') border-red-400 @enderror">
                @error('agama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="no_hp" class="block text-sm font-medium text-slate-700 mb-1">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $member->no_hp ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('no_hp') border-red-400 @enderror">
                @error('no_hp') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $member->email ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('email') border-red-400 @enderror">
                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="asal_sekolah" class="block text-sm font-medium text-slate-700 mb-1">Asal Sekolah</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $member->asal_sekolah ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('asal_sekolah') border-red-400 @enderror">
                @error('asal_sekolah') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="pangkalan_id" class="block text-sm font-medium text-slate-700 mb-1">Pangkalan</label>
                @php $pangkalanId = old('pangkalan_id', $member->pangkalan_id ?? ''); @endphp
                <select id="pangkalan_id" name="pangkalan_id"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('pangkalan_id') border-red-400 @enderror">
                    <option value="">Belum ditentukan</option>
                    @foreach ($pangkalanList as $p)
                        <option value="{{ $p->id }}" @selected((string) $pangkalanId === (string) $p->id)>{{ $p->nama }} ({{ $p->kota }})</option>
                    @endforeach
                </select>
                @error('pangkalan_id') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                <p class="mt-1 text-xs text-amber-600">Penting: anggota tanpa Pangkalan tidak akan tampil di Data Anggota maupun Peta Sebaran di website publik.</p>
                @if ($pangkalanList->isEmpty())
                    <p class="mt-1 text-xs text-amber-600">Belum ada data pangkalan. <a href="{{ route('admin.pangkalan.create') }}" class="underline">Tambahkan pangkalan</a> dulu supaya anggota bisa muncul di peta sebaran.</p>
                @endif
            </div>

            <div>
                <label for="angkatan" class="block text-sm font-medium text-slate-700 mb-1">Angkatan</label>
                @php $angkatan = old('angkatan', $member->angkatan ?? ''); @endphp
                <select id="angkatan" name="angkatan"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('angkatan') border-red-400 @enderror">
                    <option value="">Belum ditentukan</option>
                    @foreach (\App\Models\Member::ANGKATAN_OPTIONS as $opt)
                        <option value="{{ $opt }}" @selected($angkatan === $opt)>{{ $opt }}</option>
                    @endforeach
                </select>
                @error('angkatan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="jenjang" class="block text-sm font-medium text-slate-700 mb-1">Jenjang</label>
                @php $jenjang = old('jenjang', $member->jenjang ?? ''); @endphp
                <select id="jenjang" name="jenjang"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('jenjang') border-red-400 @enderror">
                    <option value="">Belum ditentukan</option>
                    @foreach (\App\Models\Member::JENJANG_OPTIONS as $opt)
                        <option value="{{ $opt }}" @selected($jenjang === $opt)>{{ $opt }}</option>
                    @endforeach
                </select>
                @error('jenjang') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="krida" class="block text-sm font-medium text-slate-700 mb-1">Krida</label>
                <input type="text" id="krida" name="krida" value="{{ old('krida', $member->krida ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('krida') border-red-400 @enderror">
                @error('krida') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="jabatan" class="block text-sm font-medium text-slate-700 mb-1">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $member->jabatan ?? '') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('jabatan') border-red-400 @enderror">
                @error('jabatan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                      class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('alamat') border-red-400 @enderror">{{ old('alamat', $member->alamat ?? '') }}</textarea>
            @error('alamat') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="space-y-5">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <label for="foto" class="block text-sm font-medium text-slate-700 mb-1">Foto Anggota</label>
            @if (isset($member) && $member->foto)
                <img src="{{ $member->foto_url }}" alt="Foto saat ini" class="w-full h-40 object-cover rounded-lg mb-2">
            @endif
            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.webp"
                   class="w-full text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-slate-700 hover:file:bg-slate-200 @error('foto') border-red-400 @enderror">
            <p class="mt-1 text-xs text-slate-400">Format jpg, jpeg, png, webp. Maks 2MB.</p>
            @error('foto') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="flex-1 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
                Simpan
            </button>
            <a href="{{ route('admin.members.index') }}" class="flex-1 text-center rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-medium py-2.5 transition">
                Batal
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function () {
    const tgl = document.getElementById('tanggal_lahir_tgl');
    const bln = document.getElementById('tanggal_lahir_bln');
    const thn = document.getElementById('tanggal_lahir_thn');
    const hidden = document.getElementById('tanggal_lahir');

    function syncTanggalLahir() {
        if (tgl.value && bln.value && thn.value) {
            hidden.value = `${thn.value}-${bln.value}-${tgl.value}`;
        } else {
            hidden.value = '';
        }
    }

    [tgl, bln, thn].forEach(el => el.addEventListener('change', syncTanggalLahir));
    // Pastikan tersinkron juga tepat sebelum form dikirim (jaga-jaga).
    hidden.closest('form')?.addEventListener('submit', syncTanggalLahir);
})();
</script>
@endpush