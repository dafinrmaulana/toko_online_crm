@extends('admin.layout.head')
@section('content-admin')
    <title>{{ config('app.name') }} | Produk</title>

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
                        <h2 class="text-center fw-bold">Chek Out</h2>
                        <hr class="border border-dark border-3 opacity-75">
                    </div>
                </div>
                <div class="row mb-5">
                    @foreach ($data as $row)
                        <div class="col-md-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    {{-- <div class="col-md-6"> --}}
                                    <img src="{{ url('gambar/' . $row->pemesanan->gambar) }}" alt=""
                                        class="img-fluid mb-3">
                                    {{-- </div> --}}
                                    <h5><u>{{ $row->pemesanan->nama_barang }}</u> </h5>
                                    <h6>Jumlah Beli: {{ $row->jumlah_beli }}</h6>
                                    <h6>Total Harga : {{ $row->total_harga }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h3 class="text-dark">Total Harga Keseluruhan : <u><span class="text-primary">{{ $t }}</span></u>
                </h3>
                <form action="/checkout/{{Auth::user()->id}}" method="post">
                    @csrf
                    <?php $random = rand(10000, 99999); ?>
                    <h5>Nomor Transaksi : <u>{{ $random }}</u></h5>
                    <input type="hidden" name="no_transaksi" value="{{ $random }}">
                    <label for="">Tenggat Pembayaran</label>
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
                    <textarea name="alamat" class="form-control shadow1 @error('alamat') is-invalid @enderror"
                        placeholder="Contoh: Gang Turi II No.04...">{{ old('alamat', Auth::user()->alamat) }}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mt-3">
                        <button type="submit" class="btn btn-outline-primary mr-2">Pesan</button>
                        <a href="/keranjang/{{Auth::user()->id}}" class="btn btn-danger mr-2">Kembali</a>
                        {{-- <button class="btn btn-danger" onclick="goBack()">Kembali</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
