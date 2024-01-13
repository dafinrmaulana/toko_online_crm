@extends('admin.layout.head')

@section('content-admin')
    <title>{{ config('app.name') }} | View Pemesanan</title>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Data Pemesanan</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid border rounded" src="{{ url('gambar/' . $barang->gambar) }}">
                            </div>
                            <div class="col-md-6">
                                <h5>{{ $barang->nama_barang }}</h5>
                                <h5>Rp.{{ $barang->harga }}</h5>
                                <h5>{{ $barang->berat }}Kg</h5>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <form action="" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-5 @if ($data->status == 'pending') {{ 'd-none' }} @endif">
                            <select name="pengirim"
                                class="form-control
                                @if ($data->status == 'selesai') {{ 'd-none' }} @endif">
                                @if ($data->status == 'pending')
                                    <input type="text" name="pengirim">
                                    @endif">
                                    @if ($data->status == 'dikirim')
                                        <option selected value="{{ $pengirim1->id }}">{{ $pengirim1->nama_pengirim }}
                                            {{ $pengirim1->ongkir }}</option>
                                    @endif
                                    @if ($data->status == 'dikemas')
                                        <option selected>Pilih Pengirim</option>
                                    @endif
                                    @if ($data->status == 'selesai')
                                        <option selected value="{{ $pengirim1->id }}">{{ $pengirim1->nama_pengirim }}
                                            {{ $pengirim1->ongkir }}</option>
                                    @endif
                                    @foreach ($pengirim as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_pengirim }}
                                            {{ $item->ongkir }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="status"
                                class="form-control
                            @if ($data->status == 'selesai') {{ 'd-none' }} @endif">
                                @if ($data->status == 'dikemas')
                                    <option value="dikirim" selected>Dikirim</option>
                                @endif
                                @if ($data->status == 'dikirim')
                                    <option value="selesai" selected>Selesai</option>
                                @endif
                                @if ($data->status == 'pending')
                                    <option value="dikemas" selected>Dikemas</option>
                                @endif
                            </select>
                        </div>

                        @if ($data->tenggat_pembayaran == 7)
                            <?php
                                $hari = 7;
                                if ($data->created_at >= now()->subDay($hari) and $data->status_pembayaran == 'belum' and $data->status == 'pending') {
                            ?>
                            <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                            <?php
                                }else if ($data->created_at <= now()->subDay($hari) and $data->status_pembayaran == 'belum') {
                                    ?>
                            <div class="col-md-10 text-center">
                                <select name="status_pembayaran" id="" class="form-control mt-3">
                                    <option value="sudah">Sudah Membayar</option>
                                </select>
                            </div>
                            <?php
                                }
                            ?>
                        @endif
                        @if ($data->tenggat_pembayaran == 14)
                            <?php
                                $hari = 14;
                                if ($data->created_at >= now()->subDay($hari) and $data->status_pembayaran == 'belum' and $data->status == 'pending') {
                            ?>
                            <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                            <?php
                                }else if ($data->created_at <= now()->subDay($hari) and $data->status_pembayaran == 'belum') {
                                    ?>
                            <div class="col-md-10 text-center">
                                <select name="status_pembayaran" id="" class="form-control mt-3">
                                    <option value="sudah">Sudah Membayar</option>
                                </select>
                            </div>
                            <?php
                                }
                            ?>
                        @endif
                        @if ($data->tenggat_pembayaran == 30)
                            <?php
                                $hari = 30;
                                if ($data->created_at >= now()->subDay($hari) and $data->status_pembayaran == 'belum' and $data->status == 'pending') {
                            ?>
                            <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                            <?php
                                }else if ($data->created_at <= now()->subDay($hari) and $data->status_pembayaran == 'belum') {
                                    ?>
                            <div class="col-md-10 text-center">
                                <select name="status_pembayaran" id="" class="form-control mt-3">
                                    <option value="sudah">Sudah Membayar</option>
                                </select>
                            </div>
                            <?php
                                }
                            ?>
                        @endif

                        @if ($data->tenggat_pembayaran == 1)
                            @if ($data->status_pembayaran == 'belum')
                                <div class="col-md-10 text-center">
                                    <select name="status_pembayaran" id="" class="form-control mt-3">
                                        <option value="sudah">Sudah Membayar</option>
                                    </select>
                                </div>
                            @elseif ($data->status_pembayaran == 'sudah')
                                <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                            @endif
                        @endif
                        @if ($data->tenggat_pembayaran == 2)
                            @if ($data->status_pembayaran == 'belum')
                                <div class="col-md-10 text-center">
                                    <select name="status_pembayaran" id="" class="form-control mt-3">
                                        <option value="sudah">Sudah Membayar</option>
                                    </select>
                                </div>
                            @elseif ($data->status_pembayaran == 'sudah')
                                <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                            @endif
                        @endif

                        {{-- @if ($data->status_pembayaran == 'belum')
                            @if ($data->status == 'pending')
                                <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                            @else
                                <div class="col-md-10 text-center">
                                    <select name="status_pembayaran" id="" class="form-control mt-3">
                                        <option value="sudah">Sudah Membayar</option>
                                    </select>
                                </div>
                            @endif
                        @elseif ($data->status_pembayaran == 'sudah')
                            <input type="hidden" name="status_pembayaran" value="{{ $data->status_pembayaran }}">
                        @elseif ($data->status == 'pending')
                        @endif --}}
                        <div class="col-md-12">
                            <div class="form-group d-flex justify-content-end">
                                <a href="{{ route('pesanan') }}" class="btn btn-outline-primary me-2 mt-3"
                                    style="margin-right: 10px">Kembali</a>
                                <button type="submit"
                                    class="btn bnt-block btn-primary mt-3
                                @if ($data->status == 'selesai') {{ 'd-none' }} @endif">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
