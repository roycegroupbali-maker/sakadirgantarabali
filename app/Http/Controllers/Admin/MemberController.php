<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMemberRequest;
use App\Http\Requests\Admin\UpdateMemberRequest;
use App\Models\Member;
use App\Models\Pangkalan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class MemberController extends Controller
{
    public function index(Request $request): View
    {
        $memberList = $this->filteredQuery($request)
            ->paginate(10)
            ->withQueryString();

        return view('admin.members.index', compact('memberList'));
    }

    /**
     * Unduh data anggota (sesuai filter pencarian/status yang aktif) sebagai PDF.
     */
    public function exportPdf(Request $request): Response
    {
        $memberList = $this->filteredQuery($request)->get();

        $pdf = Pdf::loadView('admin.members.pdf', [
            'memberList' => $memberList,
            'q' => $request->input('q'),
            'status' => $request->input('status'),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('data-anggota-'.now()->format('Y-m-d-His').'.pdf');
    }

    /**
     * Query dasar yang dipakai bersama oleh halaman index dan unduh PDF,
     * agar hasil PDF selalu mengikuti filter pencarian/status yang aktif.
     */
    protected function filteredQuery(Request $request)
    {
        return Member::query()
            ->with('pangkalan')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->input('q').'%')
                    ->orWhere('nomor_anggota', 'like', '%'.$request->input('q').'%');
            })
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->input('status')))
            ->latest();
    }

    public function create(): View
    {
        $pangkalanList = Pangkalan::orderBy('nama')->get();

        return view('admin.members.create', compact('pangkalanList'));
    }

    public function store(StoreMemberRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('members', 'public');
        }

        Member::create($data);

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Member $member): View
    {
        $pangkalanList = Pangkalan::orderBy('nama')->get();

        return view('admin.members.edit', compact('member', 'pangkalanList'));
    }

    public function update(UpdateMemberRequest $request, Member $member): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($member->foto) {
                Storage::disk('public')->delete($member->foto);
            }
            $data['foto'] = $request->file('foto')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('admin.members.index')->with('success', 'Data anggota berhasil diubah.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        if ($member->foto) {
            Storage::disk('public')->delete($member->foto);
        }

        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}
