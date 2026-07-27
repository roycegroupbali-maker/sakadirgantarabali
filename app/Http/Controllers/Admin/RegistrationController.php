<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRegistrationRequest;
use App\Mail\RegistrationStatusUpdatedMail;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index(Request $request): View
    {
        $registrationList = Registration::query()
            ->with('pangkalan')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->input('q').'%')
                    ->orWhere('kode_pendaftaran', 'like', '%'.$request->input('q').'%')
                    ->orWhere('email', 'like', '%'.$request->input('q').'%');
            })
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->input('status')))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $stats = [
            'total' => Registration::count(),
            'menunggu' => Registration::where('status', 'Menunggu Verifikasi')->count(),
            'dihubungi' => Registration::where('status', 'Dihubungi')->count(),
            'diterima' => Registration::where('status', 'Diterima')->count(),
            'ditolak' => Registration::where('status', 'Ditolak')->count(),
        ];

        return view('admin.pendaftaran.index', compact('registrationList', 'stats'));
    }

    public function update(UpdateRegistrationRequest $request, Registration $pendaftaran): RedirectResponse
    {
        $statusSebelumnya = $pendaftaran->status;

        $pendaftaran->update($request->validated());

        if ($pendaftaran->status !== $statusSebelumnya) {
            try {
                Mail::to($pendaftaran->email)->send(
                    new RegistrationStatusUpdatedMail($pendaftaran, $statusSebelumnya)
                );
            } catch (\Throwable $e) {
                Log::warning('Gagal mengirim email update status pendaftaran: '.$e->getMessage());
            }
        }

        return redirect()->route('admin.pendaftaran.index')
            ->with('success', 'Status pendaftaran '.$pendaftaran->kode_pendaftaran.' berhasil diperbarui.');
    }

    public function destroy(Registration $pendaftaran): RedirectResponse
    {
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
