<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Dosen; 

class DosenController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        $dosens = Dosen::latest()->paginate(10);

        return view('dosens.index', compact('dosens'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dosens.create');
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
            'nip'           => 'required',
            'kelas'         => 'required',
        ]);

        Dosen::create([
            'nama'          => $request->nama,
            'nip'           => $request->nip,
            'kelas'         => $request->kelas,
        ]);

        return redirect()->route('dosens.index')->with(['success' => 'Data saved successfully!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $dosen = Dosen::findOrFail($id);

        return view('show', compact('dosen'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosens.edit', compact('dosen'));
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
            'nip'           => 'required',
            'kelas'         => 'required',
        ]);

        $dosen = Dosen::findOrFail($id);

        $dosen->update([
            'nama'          => $request->nama,
            'nip'           => $request->nip,
            'kelas'         => $request->kelas,
        ]);

        return redirect()->route('dosens.index')->with(['success' => 'Data Changed Successfully!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $dosen = Dosen::findOrFail($id);

        //delete
        $dosen->delete();

        return redirect()->route('dosens.index')->with(['success' => 'Data Deleted Successfully!']);
    }
}
