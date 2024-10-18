@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <a href="{{ route('pegawais.create') }}" class="btn btn-md btn-success mb-3">Add Pegawai</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Divisi</th>
                    <th scope="col" style="width: 20%">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nik }}</td>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->divisi }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Are you sure ?');" action="{{ route('pegawais.destroy', $pegawai->id) }}" method="POST">
                                <a href="{{ route('pegawais.edit', $pegawai->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Pegawai is not available.
                    </div>
                @endforelse
            </tbody>
        </table>
        {{ $pegawais->links() }}
    </div>
</div>
@endsection
