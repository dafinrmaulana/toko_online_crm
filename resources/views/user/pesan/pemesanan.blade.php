@extends('admin.layout.head')

@section('content-admin')
    <style>
        .form-control:focus {
            box-shadow: 2px 2px 5px rgba(0, 0, 0, .5) !important;
            border: 0px;
        }
    </style>
    <title>Pemesanan</title>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <h1 class="text-right"><span class="bg-dark text-light">BUY</span> Online</h1>
                        <hr>
                        <h3 class="fw-bold">Checkout</h3>
                        <?php $random = rand(10000, 99999); ?>
                        <form action="/pemesanan/{{ $data->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="harga" value="{{ $data->harga }}">
                            <input type="hidden" name="id_barang" value="{{ $data->id }}">
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="no_transaksi" value="{{ $random }}">

                            <label for="" class="fw-bold" style="font-size: 18px">Nama Penerima</label>
                            <input type="text" class="form-control shadow1 @error('nama_pemesan') is-invalid @enderror"
                                name="nama_pemesan" placeholder="Contoh: Rani Rosada" value="{{ old('nama_pemesan') }}">
                            @error('nama_pemesan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="" class="fw-bold mt-1" style="font-size: 18px">Jumlah Beli</label>
                            <input type="number" class="form-control shadow1 @error('jumlah_beli') is-invalid @enderror"
                                name="jumlah_beli" value="{{ old('jumlah_beli'), '1' }}" placeholder="Masukan Jumlah Beli">
                            @error('jumlah_beli')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="" class="mt-1">Tenggat Pembayaran</label>
                            <select name="tenggat" id=""
                                class="form-control shadow1 @error('tenggat') is-invalid @enderror">
                                <option selected>Pilih Tenggat Pembayaran</option>
                                <option value="1">PBD</option>
                                <option value="2">PAD</option>
                                <option value="7">TOP 7 Days</option>
                                <option value="14">TOP 14 Days</option>
                                <option value="30">TOP 30 Days</option>
                            </select>
                            @error('tenggat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="" class="fw-bold mt-1" style="font-size: 18px">Alamat Pengiriman</label>
                            <textarea name="alamat" class="form-control shadow1 @error('alamat') is-invalid @enderror" placeholder="Contoh: Gang Turi II No.04...">{{ old('alamat', Auth::user()->alamat) }}</textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            {{-- product --}}
                            <label for="" class="fw-bold mt-1" style="font-size: 18px"> Product Pilihan Anda</label>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <img src="{{ url('gambar/' . $data->gambar) }}" alt="vector"
                                                class="img-fluid ">
                                        </div>
                                        <div class="col-md-7">
                                            <span><input type="text" class="form-control fw-bold" style="font-size: 16px"
                                                    value="{{ $data->nama_barang }}" disabled></span>

                                            <div class="row mt-4">
                                                <div class="col">No.Transaksi</div>
                                                <div class="col-1">:</div>
                                                <div class="col">{{ $random }}</div>

                                            </div>

                                            <div class="row">
                                                <div class="col">Berat</div>
                                                <div class="col-1">:</div>
                                                <div class="col">{{ $data->berat }} {{ $data->masa }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col">Harga</div>
                                                <div class="col-1">:</div>
                                                <div class="col">Rp.{{ $data->harga }}</div>
                                            </div>

                                            <button class="btn btn-dark mt-4 rounded-0 w-100">Checkout Sekarang</button>
                                            <div class="text-warning" style="font-size: 14px">
                                                No.transaksi akan berubah setiap di refresh
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <h4>Keterangan</h4>
                        <p>Transfer Pembayaran Ke Rekening Dibawah Ini: <br>
                            Nomor Rekening: 0000-82666-928-01 <br>
                            Atas Nama: PT NPS Pemuda
                            <!-- Tenggat Pembayaran: 1x24 Jam -->
                        </p>
                    </div>
                </div>
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <h4>Catatan</h4>
                        <p style="font-size: 15px;">
                            Jika sudah melakukan pembayaran, silahkan konfirmasi pembayaran anda dengan mengklik tombol
                            <a href="https://api.whatsapp.com/send/?phone=6281283399261&text&type=phone_number&app_absent=0"
                                class="text-light bg-dark text-decoration-none rounded"
                                style="padding: 2px 5px 2px 5px">Whatsapp</a><br>
                            Kirimkan pesan dengan format sebagai berikut: <br>
                            -Nama Pengirim <br>
                            -Nomor Transaksi <br>
                            -Bukti Pembayaran
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="cekout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
