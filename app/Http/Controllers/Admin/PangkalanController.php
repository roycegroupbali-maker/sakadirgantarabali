<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePangkalanRequest;
use App\Http\Requests\Admin\UpdatePangkalanRequest;
use App\Models\Pangkalan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PangkalanController extends Controller
{
    public function index(): View
    {
        $pangkalanList = Pangkalan::withCount('members')->orderBy('nama')->paginate(10);

        return view('admin.pangkalan.index', compact('pangkalanList'));
    }

    public function create(): View
    {
        return view('admin.pangkalan.create');
    }

    public function store(StorePangkalanRequest $request): RedirectResponse
    {
        Pangkalan::create($request->validated());

        return redirect()->route('admin.pangkalan.index')->with('success', 'Pangkalan berhasil ditambahkan.');
    }

    public function edit(Pangkalan $pangkalan): View
    {
        return view('admin.pangkalan.edit', compact('pangkalan'));
    }

    public function update(UpdatePangkalanRequest $request, Pangkalan $pangkalan): RedirectResponse
    {
        $pangkalan->update($request->validated());

        return redirect()->route('admin.pangkalan.index')->with('success', 'Pangkalan berhasil diubah.');
    }

    public function destroy(Pangkalan $pangkalan): RedirectResponse
    {
        $pangkalan->delete();

        return redirect()->route('admin.pangkalan.index')->with('success', 'Pangkalan berhasil dihapus.');
    }
}
