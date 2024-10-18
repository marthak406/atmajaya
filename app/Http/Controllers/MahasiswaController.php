<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);

        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('mahasiswas.create');
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
            'nim'           => 'required',
            'jurusan'       => 'required',
        ]);

        Mahasiswa::create([
            'nama'          => $request->nama,
            'nim'           => $request->nim,
            'jurusan'       => $request->jurusan,
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
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('show', compact('mahasiswa'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswas.edit', compact('mahasiswa'));
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
            'nim'           => 'required',
            'jurusan'       => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama'          => $request->nama,
            'nim'           => $request->nim,
            'jurusan'       => $request->jurusan,
        ]);

        return redirect()->route('mahasiswas.index')->with(['success' => 'Data Changed Successfully!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        //delete
        $mahasiswa->delete();

        return redirect()->route('mahasiswas.index')->with(['success' => 'Data Deleted Successfully!']);
    }
}
