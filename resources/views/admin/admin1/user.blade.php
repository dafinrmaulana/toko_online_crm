@extends('admin.layout.head')
@section('content-admin')
    <title>{{ config('app.name') }} | User</title>

    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h2 class="text-center fw-bold">Data Pelanggan</h2>
                        <hr class="border border-dark border-3 opacity-75">
                    </div>
                </div>
                <?php
                $no = 1;
                ?>
                {{-- <a href="{{ route('admin.create') }}" class="btn btn-outline-primary">Tambah User</a> --}}
                <div class="table-responsive">
                    <table class="border-dark table mt-5">
                        <tr>
                            <th>Nama</th>
                            <th>Nama Perusahaan</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->company }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->no_hp }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>
                                    {{-- <a href="/admin/edit/{{ $row -> id }}" class="btn btn-outline-success">Edit</a> --}}
                                    <form action="/admin/delete/{{ $row->id }}" method="get"
                                        class="form-basic d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{-- <div class="p-4 float-end">
                    {{ $data->onEachSide(5)->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
