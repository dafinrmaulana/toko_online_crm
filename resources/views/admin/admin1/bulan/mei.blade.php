@extends('admin.layout.head')
@section('content-admin')
    <title>{{ config('app.name') }} | Mei </title>

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
                        <h2 class="text-center fw-bold">Rekap Data Bulan Mei</h2>
                        <hr class="border border-dark border-3 opacity-75">
                    </div>
                </div>
                <a href="" class="btn btn-outline-primary">Export Data</a>
                <table class="border-dark table mt-5 text-center">
                    <tr>
                        <th>Nomor Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                    </tr>
                    @if ($data->count() > 0)
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->no_transaksi }}</td>
                                <td>{{ $row->pemesanan->nama_barang }}</td>
                                <td>{{ $row->nama_pemesan }}</td>
                                <td>{{ $row->tanggal_transaksi }}</td>
                                <td>{{ $row->jumlah_beli }}</td>
                                <td>{{ $row->total_harga }}</td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6">Data Kosong</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
