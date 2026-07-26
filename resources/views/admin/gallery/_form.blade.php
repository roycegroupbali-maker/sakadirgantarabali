@csrf
@if (isset($gallery))
    @method('PUT')
@endif

<div class="max-w-xl bg-white rounded-xl border border-slate-200 p-5 space-y-5">
    <div>
        <label for="judul" class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
        <input type="text" id="judul" name="judul" value="{{ old('judul', $gallery->judul ?? '') }}" required
               class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('judul') border-red-400 @enderror">
        @error('judul')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="deskripsi" class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4"
                  class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('deskripsi') border-red-400 @enderror">{{ old('deskripsi', $gallery->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="tanggal" class="block text-sm font-medium text-slate-700 mb-1">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal"
               value="{{ old('tanggal', isset($gallery) ? $gallery->tanggal->format('Y-m-d') : now()->format('Y-m-d')) }}" required
               class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('tanggal') border-red-400 @enderror">
        @error('tanggal')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="foto" class="block text-sm font-medium text-slate-700 mb-1">Foto</label>
        @if (isset($gallery) && $gallery->foto)
            <img src="{{ $gallery->foto_url }}" alt="Foto saat ini" class="w-full h-40 object-cover rounded-lg mb-2">
        @endif
        <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.webp" @if (!isset($gallery)) required @endif
               class="w-full text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-slate-700 hover:file:bg-slate-200 @error('foto') border-red-400 @enderror">
        <p class="mt-1 text-xs text-slate-400">Format jpg, jpeg, png, webp. Maks 2MB.</p>
        @error('foto')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-2 pt-2">
        <button type="submit" class="flex-1 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
            Simpan
        </button>
        <a href="{{ route('admin.gallery.index') }}" class="flex-1 text-center rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-medium py-2.5 transition">
            Batal
        </a>
    </div>
</div>
