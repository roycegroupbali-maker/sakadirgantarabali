@csrf
@if (isset($news))
    @method('PUT')
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-5">
        <div>
            <label for="judul" class="block text-sm font-medium text-slate-700 mb-1">Judul Berita</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $news->judul ?? '') }}" required
                   class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('judul') border-red-400 @enderror">
            @error('judul')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="isi" class="block text-sm font-medium text-slate-700 mb-1">Isi Berita</label>
            <textarea id="isi" name="isi" rows="10"
                      class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('isi') border-red-400 @enderror">{{ old('isi', $news->isi ?? '') }}</textarea>
            @error('isi')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="space-y-5">
        <div class="bg-white rounded-xl border border-slate-200 p-4 space-y-4">
            <div>
                <label for="penulis" class="block text-sm font-medium text-slate-700 mb-1">Penulis</label>
                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $news->penulis ?? '') }}" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('penulis') border-red-400 @enderror">
                @error('penulis')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_publish" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Publish</label>
                <input type="date" id="tanggal_publish" name="tanggal_publish"
                       value="{{ old('tanggal_publish', isset($news) ? $news->tanggal_publish->format('Y-m-d') : now()->format('Y-m-d')) }}" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('tanggal_publish') border-red-400 @enderror">
                @error('tanggal_publish')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select id="status" name="status"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 @error('status') border-red-400 @enderror">
                    @php $selectedStatus = old('status', $news->status ?? 'draft'); @endphp
                    <option value="draft" @selected($selectedStatus === 'draft')>Draft</option>
                    <option value="publish" @selected($selectedStatus === 'publish')>Publish</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="thumbnail" class="block text-sm font-medium text-slate-700 mb-1">Thumbnail</label>
                @if (isset($news) && $news->thumbnail)
                    <img src="{{ $news->thumbnail_url }}" alt="Thumbnail saat ini" class="w-full h-32 object-cover rounded-lg mb-2">
                @endif
                <input type="file" id="thumbnail" name="thumbnail" accept=".jpg,.jpeg,.png,.webp"
                       class="w-full text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-slate-700 hover:file:bg-slate-200 @error('thumbnail') border-red-400 @enderror">
                <p class="mt-1 text-xs text-slate-400">Format jpg, jpeg, png, webp. Maks 2MB.</p>
                @error('thumbnail')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="flex-1 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
                Simpan
            </button>
            <a href="{{ route('admin.news.index') }}" class="flex-1 text-center rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-medium py-2.5 transition">
                Batal
            </a>
        </div>
    </div>
</div>
