@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <a href="{{ route('dosens.create') }}" class="btn btn-md btn-success mb-3">Add Dosen</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col" style="width: 20%">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosens as $dosen)
                    <tr>
                        <td>{{ $dosen->nip }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->kelas }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Are you sure ?');" action="{{ route('dosens.destroy', $dosen->id) }}" method="POST">
                                <a href="{{ route('dosens.edit', $dosen->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Dosen is not available.
                    </div>
                @endforelse
            </tbody>
        </table>
        {{ $dosens->links() }}
    </div>
</div>
@endsection
