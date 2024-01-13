@extends('admin.layout.head')

@section('content-admin')
    <title>{{ config('app.name') }} | View Pemesanan</title>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Data Pemesanan</h3>
                <hr>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <table border="0" class="table table-striped">
                                {{-- <div class="col-md-6"> --}}
                                <tr>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">No
                                                Transaksi</span>
                                            <br>  <h6>{{ $data->no_transaksi }}</h6>
                                        </h5>
                                    </td>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">Nama
                                                Pemesan</span> <br> <h6>{{ $data->nama_pemesan }}</h6> </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">No Hp
                                                Pemesan</span> <br> <h6>{{ $user->no_hp }}</h6> </h5>
                                    </td>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">Nama
                                                Perusahaan</span> <br> <h6>{{ $data->user->company }}</h6> </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">Tanggal
                                                Transaksi</span> <br> <h6>{{ $data->tanggal_teransaksi }}</h6> </h5>
                                    </td>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">Total
                                                Harga</span>
                                            <br><h6> Rp. {{ $data->total_harga }}</h6>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">Tenggat
                                                Pembayaran</span>
                                            <br><h6>
                                                @if ($data->tenggat_pembayaran == 1)
                                                    PBD
                                                @elseif ($data->tenggat_pembayaran == 2)
                                                    PAD
                                                @elseif ($data->tenggat_pembayaran == 7)
                                                    TOP 7 Days
                                                @elseif ($data->tenggat_pembayaran == 14)
                                                    TOP 14 Days
                                                @elseif ($data->tenggat_pembayaran == 30)
                                                    TOP 30 Days
                                                @endif
                                            </h6>
                                        </h5>
                                    </td>
                                    <td class="text-left">
                                        <h5 class=""><span style="color: #3b3b3b1; font-weight: bold;">Alamat
                                                Pemesan
                                            </span><br> <h6>{{ $data->alamat }}</h6> </h5>
                                    </td>
                                </tr>
                                {{-- </div> --}}
                                <div class="col-md-6">



                                </div>
                            </table>
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid border rounded" src="{{ url('gambar/' . $barang->gambar) }}">
                            </div>
                            <div class="col-md-6">
                                <h5>{{ $barang->nama_barang }}</h5>
                                <h5>Rp.{{ $barang->harga }}</h5>
                                <h5>{{ $barang->berat }}Kg</h5>
                            </div>
                        </div><br>
                        <h5>
                            Catatan Pembatalan:
                            <span>{{$data->catatan}}</span>
                        </h5>
                    </div>
                </div><br><br>
                <div class="d-flex text-end justify-content-between">
                    <a href="/pesanan/batal/{{ $data->id }}" class="btn btn-outline-info btn-sm mr-2">Acc
                                            Pembatalan</a>
                    <a href="/pesanan/non/{{ $data->id }}" class="btn btn-outline-danger btn-sm">Tidak
                                            Di Acc</a>
                </div>
                </div>
        </div>
    </div>
@endsection
