@extends('admin.layout.head')
@section('content-admin')
    <title>Status Pembelian</title>

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
                <div class="table-responsive">
                    <table class="border-dark table mt-5 text-center">
                        <tr>
                            <th>Nomor Transaksi</th>
                            <th>Barang</th>
                            <th>Tenggat Pembayaran</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            {{-- @can('role', 'admin') --}}
                            {{-- @endcan --}}
                            @can('role', 'user')
                            @endcan
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Action</th>
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
                                    @can('role', 'admin')
                                        <a href="/pesanan/view/{{ $row->id }}" class="btn btn-outline-info">View</a>
                                    @endcan
                                </td>

                                <td>
                                    @if ($row->tenggat_pembayaran == 7)
                                        <?php
                                        $hour = 7;
                                        if ($row->created_at <= now()->subDay($hour) and $row->status_pembayaran == 'belum') {
                                            echo '<span>Segera Bayar</span>';
                                        } elseif ($row->created_at <= now()->subDay($hour) and $row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'belum') {
                                            echo '<span>Belum Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        }
                                        ?>
                                    @endif

                                    @if ($row->tenggat_pembayaran == 14)
                                        <?php
                                        $hour = 14;
                                        if ($row->created_at <= now()->subDay($hour) and $row->status_pembayaran == 'belum') {
                                            echo '<span>Segera Bayar</span>';
                                        } elseif ($row->created_at <= now()->subDay($hour) and $row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'belum') {
                                            echo '<span>Belum Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        }
                                        ?>
                                    @endif

                                    @if ($row->tenggat_pembayaran == 30)
                                        <?php
                                        $hour = 30;
                                        if ($row->created_at <= now()->subDay($hour) and $row->status_pembayaran == 'belum') {
                                            echo '<span>Segera Bayar</span>';
                                        } elseif ($row->created_at <= now()->subDay($hour) and $row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'belum') {
                                            echo '<span>Belum Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        }
                                        ?>
                                    @endif

                                    @if ($row->tenggat_pembayaran == 1)
                                        <?php
                                        if ($row->status_pembayaran == 'belum') {
                                            echo '<span>Belum Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        }
                                        ?>
                                    @endif

                                    @if ($row->tenggat_pembayaran == 2)
                                        <?php
                                        if ($row->status_pembayaran == 'belum') {
                                            echo '<span>Belum Bayar</span>';
                                        } elseif ($row->status_pembayaran == 'sudah') {
                                            echo '<span>Sudah Bayar</span>';
                                        }
                                        ?>
                                    @endif
                                </td>

                                <td>
                                    @if ($row->status == 'pending')
                                        {{-- <a href="/pembatalan/{{ $row->id }}/{{ Auth::user()->id }}"
                                            class="btn btn-outline-info btn-sm">Batalkan Pesanan</a> --}}
                                            <a class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#catatanModal">Batalkan Pesanan</a>
                                    @elseif ($row->status == 'batal')
                                        <span class="btn btn-outline-info btn-sm">Proses Pembatalan</span>
                                    @elseif ($row->status == 'selesai')
                                        <span class="btn btn-outline-success btn-sm">Selesai</span>
                                    @else
                                        <span class="btn btn-outline-info btn-sm">Pesanan Diperoses</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <span style="font-size: 13px"><b class="text-warning">Catatan:</b><br>-Konfirmasi pembayaran dengan
                    menghubungi<a
                        href="https://api.whatsapp.com/send/?phone=6281283399261&text&type=phone_number&app_absent=0"
                        style="padding: 2px 5px 2px 5px; color: ">Whatsapp</a></span><br>
                <span style="font-size: 13px"><b class="text-warning"></b>-Jika Admin tidak meng acc pembatalan makan pesanan akan otomatis menunggu konfirmasi kembali</span>
            </div>
        </div>
    </div>
    <div class="modal fade" id="catatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alasan Pembatalan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/pembatalan/{{ $row->id }}/{{ Auth::user()->id }}" method="post">
                    @csrf
                    {{-- <label for="">Alasan Pembatalan</label> --}}
                    <input type="text" class="form-control" name="catatan" placeholder="Masukan alasan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
