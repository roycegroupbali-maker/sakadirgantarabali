<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAspirationRequest;
use App\Models\Aspiration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AspirationController extends Controller
{
    public function index(Request $request): View
    {
        $aspirationList = Aspiration::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->input('q').'%')
                    ->orWhere('judul', 'like', '%'.$request->input('q').'%')
                    ->orWhere('nomor_tiket', 'like', '%'.$request->input('q').'%');
            })
            ->when($request->filled('kategori'), fn ($query) => $query->where('kategori', $request->input('kategori')))
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->input('status')))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $stats = [
            'total' => Aspiration::count(),
            'menunggu' => Aspiration::where('status', 'Menunggu Verifikasi')->count(),
            'diproses' => Aspiration::whereIn('status', ['Sedang Diproses', 'Diteruskan ke Instansi Terkait'])->count(),
            'selesai' => Aspiration::where('status', 'Selesai')->count(),
            'ditolak' => Aspiration::where('status', 'Ditolak')->count(),
        ];

        $kategoriList = Aspiration::query()->distinct()->pluck('kategori');

        return view('admin.aspirasi.index', compact('aspirationList', 'stats', 'kategoriList'));
    }

    public function show(Aspiration $aspirasi): View
    {
        return view('admin.aspirasi.show', ['aspiration' => $aspirasi]);
    }

    public function update(UpdateAspirationRequest $request, Aspiration $aspirasi): RedirectResponse
    {
        $data = $request->validated();

        if ($data['status'] !== $aspirasi->status) {
            $aspirasi->tambahRiwayat(
                $data['status'].(filled($data['catatan'] ?? null) ? ' — '.$data['catatan'] : '').' (diperbarui admin)'
            );
        } elseif (filled($data['catatan'] ?? null)) {
            $aspirasi->tambahRiwayat($data['catatan']);
        }

        $aspirasi->status = $data['status'];
        $aspirasi->save();

        return redirect()->route('admin.aspirasi.show', $aspirasi)
            ->with('success', 'Status laporan '.$aspirasi->nomor_tiket.' berhasil diperbarui.');
    }

    public function destroy(Aspiration $aspirasi): RedirectResponse
    {
        $aspirasi->delete();

        return redirect()->route('admin.aspirasi.index')->with('success', 'Data laporan berhasil dihapus.');
    }
}
