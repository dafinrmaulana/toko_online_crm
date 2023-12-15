@extends('admin.layout.head')
@section('content-admin')
<title>Edit Data | {{$data->nama}}</title>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center fw-bold">Edit Data {{ $data->nama }}</h2>
                        <hr class="border border-dark border-3 opacity-75">
                        <form action="" method="post" class="form-basic">
                            @csrf
                            <div class="form-group">
                                <label for="" class="fw-bold">Nama Perusahaan</label>
                                <input type="text" name="company"
                                    class="form-control
                                    @error('company')
                                    is-invalid
                                    @enderror"
                                    placeholder="Masukan Nama Perusahaan" value="{{ old('company', $data->company) }}">
                                @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">Nama</label>
                                        <input type="text" name="nama"
                                            class="form-control
                                        @error('nama')
                                        is-invalid
                                        @enderror"
                                            placeholder="Masukan Nama" value="{{ old('nama', $data->nama) }}">

                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="fw-bold">No Handphone</label>
                                        <input type="text" name="no_hp"
                                            class="form-control
                                        @error('no_hp')
                                        is-invalid
                                        @enderror"
                                            placeholder="Masukan No Handphone" value="{{ old('no_hp', $data->no_hp) }}">

                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="email"
                                            class="form-control
                                            @error('email')
                                        is-invalid
                                        @enderror"
                                            placeholder="Masukan Email" value="{{ old('email', $data->email) }}">

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="fw-bold">Email</label>
                                        <input type="email" name="co"
                                            class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror"
                                            placeholder="Masukan Email" value="{{ old('email', $data->email) }}" disabled>

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="fw-bold">Password</label>
                                        <input type="password" name="password"
                                            class="form-control
                                        @error('password')
                                        is-invalid
                                        @enderror"
                                            placeholder="Masukan Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="" class="fw-bold">Alamat</label>
                                <textarea name="alamat"
                                    class="form-control
                                    @error('alamat')
                                        is-invalid
                                    @enderror"
                                    placeholder="Contoh: Gang Turi II No.04...">{{ old('alamat', $data->alamat) }}
                                </textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Edit</button>
                                <a href="{{route('dashboardUser')}}" class="btn btn-outline-primary mt-3">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
