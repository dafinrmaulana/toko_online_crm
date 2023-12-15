@extends('admin.layout.head')
@section('content-admin')
    <title>
        {{ config('app.name') }} | Pengajuan Pembatalan</title>

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
                        <h2 class="text-center fw-bold">Table Pengajuan Pembatalan</h2>
                        <hr class="border border-dark border-3 opacity-75">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="border-dark table mt-5 text-center">
                        <tr>
                            <th>Nomor Transaksi</th>
                            <th>Barang</th>
                            <th>Tenggat Pembayaran</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            @can('role', 'admin')
                                <th>Action</th>
                            @endcan
                        </tr>

                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->no_transaksi }}</td>
                                <td>{{ $row->pemesanan->nama_barang }}</td>
                                <td>
                                    @if ($row->tenggat_pembayaran == 1)
                                        <span>PDB</span>
                                    @endif
                                    @if ($row->tenggat_pembayaran == 2)
                                        <span>PAD</span>
                                    @endif
                                    @if ($row->tenggat_pembayaran == 7)
                                        <span>TOP 7 Days</span>
                                    @endif
                                    @if ($row->tenggat_pembayaran == 14)
                                        <span>TOP 14 Days</span>
                                    @endif
                                    @if ($row->tenggat_pembayaran == 30)
                                        <span>TOP 30 Days</span>
                                    @endif
                                </td>
                                <td>{{ $row->tanggal_teransaksi }}</td>
                                <td>Rp.{{ $row->total_harga }}</td>
                                <td>
                                    @if ($row->status == 'batal')
                                        <span href="" class="text-dark">Dalam Acc</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    {{-- @can('role', 'admin') --}}
                                    <a href="/pesanan/batal/{{ $row->id }}" class="btn btn-outline-info btn-sm mr-2">Acc
                                        Pembatalan</a>
                                    <a href="/pesanan/non/{{ $row->id }}" class="btn btn-outline-danger btn-sm">Tidak
                                        Di Acc</a>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
