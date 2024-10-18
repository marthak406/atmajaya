@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <a href="{{ route('mahasiswas.create') }}" class="btn btn-md btn-success mb-3">Add Mahasiswa</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col" style="width: 20%">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Are you sure ?');" action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST">
                                <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Mahasiswa is not available.
                    </div>
                @endforelse
            </tbody>
        </table>
        {{ $mahasiswas->links() }}
    </div>
</div>
@endsection
