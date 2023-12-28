<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Data_barang;
use App\Models\Data_pemesanan;
use Illuminate\Http\Request;
use DateTime;

class KeranjangController extends Controller
{
    public function index($id){
        // dd($id);
        $data = Data_pemesanan::where('id_user', $id)->where('status', 'keranjang')->get();
        $user = Admin::all();
        $barang = Data_barang::all();
        $t = $data->sum('total_harga');
        return view('user.pesan.keranjang', compact('data','user', 'barang', 't'));
    }

    public function create(Request $request, $id, $user){
        $request->validate([
            'jumlah_beli' => 'required',
            'harga' => 'required',
            'nama' => 'required',
        ]);

        // dd($dor);

        $tanggal_transaksi = new DateTime();
        $harga_akhir = $request->harga * $request->jumlah_beli;
        // $random = rand(10000, 99999);

        Data_pemesanan::create([
            'id_user' => $user,
            'id_barang' => $id,
            'nama_pemesan' => $request->nama,
            'tanggal_teransaksi' => $tanggal_transaksi,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $harga_akhir,
            'status' => 'keranjang',
            'no_transaksi' => null,
        ]);

        $url = '/keranjang/' . $user;
        return redirect($url)->with('success', 'berhasil di basukan kekeranjang');
    }

    public function checkOut($id){
        $data = Data_pemesanan::where('id_user', $id)->where('status', 'keranjang')->get();
        $user = Admin::all();
        $barang = Data_barang::all();
        $t = $data->sum('total_harga');
        // dd($t);
        return view('user.pesan.checkOut', compact('data','user', 'barang', 't'));
    }

    public function update($user, Request $request){
        $data = Data_pemesanan::where('id_user', $user)->where('status', 'keranjang');

        $request->validate([
            'no_transaksi' => 'required',
            'tenggat' => 'required',
            'alamat' => 'required',
        ]);

        $data->update([
            'no_transaksi' => $request->no_transaksi,
            'tenggat_pembayaran' => $request->tenggat,
            'alamat' => $request->alamat,
            'status_pembayaran' => 'belum',
            'status' => 'pending',
        ]);

        return redirect('/viewuser/'.$user)->with('success', 'Pembelian Berhasil');
    }
}
