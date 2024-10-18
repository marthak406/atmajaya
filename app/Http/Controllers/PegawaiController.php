<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        $pegawais = Pegawai::latest()->paginate(10);

        return view('pegawais.index', compact('pegawais'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('pegawais.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'          => 'required|min:5',
            'nik'           => 'required',
            'divisi'        => 'required',
        ]);

        Pegawai::create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'divisi'        => $request->divisi,
        ]);

        return redirect()->route('pegawais.index')->with(['success' => 'Data saved successfully!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $Pegawai = Pegawai::findOrFail($id);

        return view('show', compact('Pegawai'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $Pegawai = Pegawai::findOrFail($id);

        return view('pegawais.edit', compact('Pegawai'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'          => 'required|min:5',
            'nik'           => 'required',
            'divisi'        => 'required',
        ]);

        $Pegawai = Pegawai::findOrFail($id);

        $Pegawai->update([
            'nama'          => $request->nama,
            'nik'           => $request->nip,
            'divisi'        => $request->kelas,
        ]);

        return redirect()->route('pegawais.index')->with(['success' => 'Data Changed Successfully!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $Pegawai = Pegawai::findOrFail($id);

        //delete
        $Pegawai->delete();

        return redirect()->route('pegawais.index')->with(['success' => 'Data Deleted Successfully!']);
    }
}
