@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('mahasiswas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="id_mahasiswa">Mahasiswa</label>
                                <select name="id_mahasiswa" class="form-control" required>
                                    <option value="">Pilih Mahasiswa</option>
                                    @foreach($mahasiswas as $mahasiswa)
                                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="semester">Semester</label>
                                <input type="text" name="semester" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nilai">Nilai</label>
                                <input type="number" name="nilai" class="form-control" step="0.01" min="0" max="100" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_dosen">Dosen</label>
                                <input type="text" name="id_dosen" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_user_verifikasi">User Verifikasi</label>
                                <input type="text" name="id_user_verifikasi" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="is_verifikasi">Status Verifikasi</label>
                                <select name="is_verifikasi" class="form-control">
                                    <option value="0">Belum Terverifikasi</option>
                                    <option value="1">Terverifikasi</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
