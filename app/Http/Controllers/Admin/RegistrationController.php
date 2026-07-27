<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRegistrationRequest;
use App\Mail\RegistrationStatusUpdatedMail;
use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function index(Request $request): View
    {
        $registrationList = $this->filteredQuery($request)
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

    /**
     * Unduh data pendaftaran (sesuai filter pencarian/status yang aktif) sebagai PDF.
     */
    public function exportPdf(Request $request): Response
    {
        $registrationList = $this->filteredQuery($request)->get();

        $pdf = Pdf::loadView('admin.pendaftaran.pdf', [
            'registrationList' => $registrationList,
            'q' => $request->input('q'),
            'status' => $request->input('status'),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('data-pendaftaran-'.now()->format('Y-m-d-His').'.pdf');
    }

    /**
     * Query dasar yang dipakai bersama oleh halaman index dan unduh PDF,
     * agar hasil PDF selalu mengikuti filter pencarian/status yang aktif.
     */
    protected function filteredQuery(Request $request)
    {
        return Registration::query()
            ->with('pangkalan')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->input('q').'%')
                    ->orWhere('kode_pendaftaran', 'like', '%'.$request->input('q').'%')
                    ->orWhere('email', 'like', '%'.$request->input('q').'%');
            })
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->input('status')))
            ->latest();
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
