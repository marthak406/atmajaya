@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <a href="{{ route('nilais.create') }}" class="btn btn-md btn-success mb-3">Add Nilai</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Semester</th>
                        <th>Tahun</th>
                        <th>Nilai</th>
                        <th>Dosen</th>
                        <th>Status Verifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilais as $nilai)
                        <tr>
                            <td>{{ $nilai->mahasiswa->nama }}</td>
                            <td>{{ $nilai->semester }}</td>
                            <td>{{ $nilai->tahun }}</td>
                            <td>{{ $nilai->nilai }}</td>
                            <td>{{ $nilai->dosen->nama }}</td>
                            <td>{{ $nilai->is_verifikasi ? 'Terverifikasi' : 'Belum Terverifikasi' }}</td>
                            <td>
                                <a href="{{ route('nilais.edit', $nilai) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('nilais.destroy', $nilai) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
