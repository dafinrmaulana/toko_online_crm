@extends('admin.layout.head')
@section('content-admin')
    <title>{{ config('app.name') }} | Pesanan   </title>

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
                        <h2 class="text-center fw-bold">Data Pemesanan</h2>
                        <hr class="border border-dark border-3 opacity-75">
                    </div>
                </div>

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
                                {{-- {{ $row->tenggat_pembayaran }} --}}
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
                                @if ($row->status == 'pending')
                                    <span href="" class="text-dark">Menunggu Konfirmasi</span>
                                @endif
                                @if ($row->status == 'dikemas')
                                    <span href="" class="text-dark">Di Kemas</span>
                                @endif
                                @if ($row->status == 'dikirim')
                                    <span href="" class="text-dark">Di Kirim</span>
                                @endif
                                @if ($row->status == 'selesai')
                                    <span href="" class="text-dark">Selesai</span>
                                @endif
                                @if ($row->status == 'batal')
                                    <span href="" class="text-dark">Acc Pembatalan</span>
                                @endif
                                @if ($row->status == 'dibatalkan')
                                    <span href="" class="text-dark">Pembatalan</span>
                                @endif
                                @if ($row->status == 'nonacc')
                                    <span href="" class="text-dark">Gagal Acc</span>
                                @endif
                            </td>
                            <td>
                                @can('role', 'admin')
                                    @if ($row->status == 'batal')
                                        <span class="btn btn-outline-info btn-sm">Proses Pembatalan</span>
                                    @else
                                        <a href="/pesanan/view/{{ $row->id }}" class="btn btn-outline-info">Lihat</a>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
