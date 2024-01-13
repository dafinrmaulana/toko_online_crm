@extends('admin.layout.head')
@section('content-admin')
    <title>Keranjang</title>

    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h2 class="text-center fw-bold">Keranjang</h2>
                        <hr class="border border-dark border-3 opacity-75">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="border-dark table mt-5 text-center">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Pembelian</th>
                            <th class="text-right">Total Harga</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->pemesanan->nama_barang }}</td>
                                <td>{{ $row->pemesanan->harga }}</td>
                                <td>{{ $row->jumlah_beli }}</td>
                                <td class="text-right">{{ $row->total_harga }}</td>
                                <td>
                                    {{-- <a href="#" class="btn btn-sm btn-outline-info">Edit</a> --}}
                                    {{-- <a href="/keranjang/delete/{{$row->id}}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                    <form action="/keranjang/delete/{{$row->id}}/{{Auth::user()->id}}" method="post" class="form-basic d-inline">
                                        {{-- @dd($row->id) --}}
                                        @csrf
                                        <button class="btn btn-outline-danger" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="text-right">
                            <td colspan="5"><span style="font-weight: bold;">Total Harga</span> : <input type="text" value="{{ $t }}" style="width: 7%" disabled></td>
                        </tr>
                    </table>
                    <div class="">
                        <a href="/chekout/{{Auth::user()->id}}" class="btn btn-outline-info ml-3">Beli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
