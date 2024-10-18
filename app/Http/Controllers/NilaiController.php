<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Pegawai;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilais.index', compact('nilais'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all(); 
        $dosens     = Dosen::all(); 
        $pegawais   = Pegawai::all();

        return view('nilais.create', compact('mahasiswas','dosens','pegawais'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswas,id', 
            'semester' => 'required|string',
            'tahun' => 'required|integer',
            'nilai' => 'required|numeric|between:0,100',
            'id_dosen' => 'required|exists:doses,id', 
            'id_user_verifikasi' => 'nullable|exists:pegawais,id', 
            'is_verifikasi' => 'boolean',
        ]);

        Nilai::create($request->all());
        return redirect()->route('nilais.index')->with('success', 'Data saved successfully!');
    }

    public function edit(Nilai $nilai)
    {
        return view('nilais.edit', compact('nilai'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswas,id',
            'semester' => 'required|string',
            'tahun' => 'required|integer',
            'nilai' => 'required|numeric|between:0,100',
            'id_dosen' => 'required|exists:doses,id',
            'id_user_verifikasi' => 'nullable|exists:pegawais,id',
            'is_verifikasi' => 'boolean',
        ]);

        $nilai->update($request->all());
        return redirect()->route('nilais.index')->with('success', 'Data Changed Successfully!');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilais.index')->with('success', 'Data Deleted Successfully!');
    }
}
