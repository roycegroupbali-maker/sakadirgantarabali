<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDirgaNewsRequest;
use App\Http\Requests\Admin\UpdateDirgaNewsRequest;
use App\Models\DirgaNews;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DirgaNewsController extends Controller
{
    public function index(): View
    {
        $newsList = DirgaNews::latest('tanggal_publish')->paginate(10);

        return view('admin.news.index', compact('newsList'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(StoreDirgaNewsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = DirgaNews::generateUniqueSlug($data['judul']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('news', 'public');
        }

        DirgaNews::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(DirgaNews $news): View
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    public function update(UpdateDirgaNewsRequest $request, DirgaNews $news): RedirectResponse
    {
        $data = $request->validated();

        if ($data['judul'] !== $news->judul) {
            $data['slug'] = DirgaNews::generateUniqueSlug($data['judul'], $news->id);
        }

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail) {
                Storage::disk('public')->delete($news->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diubah.');
    }

    public function destroy(DirgaNews $news): RedirectResponse
    {
        if ($news->thumbnail) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
