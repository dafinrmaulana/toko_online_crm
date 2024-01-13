<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Data_barang;
use App\Models\Data_pemesanan;
use DateTime;
use Illuminate\Http\Request;

class PemesanController extends Controller
{
    public function index($id){
        $data = Data_barang::find($id);
        return view('user.pesan.pemesanan', compact('data'));
    }

    public function create(Request $request, $id){
        $request->validate([
            'id_user' => 'required',
            'id_barang' => 'required',
            'no_transaksi' => 'required',
            'nama_pemesan' => 'required',
            'jumlah_beli' => 'required',
            'harga' => 'required',
            'tenggat' => 'required|in:1, 2, 7, 14, 30',
            'alamat' => 'required',
        ]);
        $tanggal_transaksi = new DateTime();
        // return $tanggal_transaksi;
        // dd($tanggal_transaksi);
        $harga_akhir = $request->harga * $request->jumlah_beli;

        Data_pemesanan::create(
            [
                'id_user' => $request->id_user,
                'id_barang' => $id,
                'no_transaksi' => $request->no_transaksi,
                'nama_pemesan' => $request->nama_pemesan,
                'jumlah_beli' => $request->jumlah_beli,
                'alamat' => $request->alamat,
                'total_harga' => $harga_akhir,
                'tenggat_pembayaran' => $request->tenggat,
                'tanggal_teransaksi' => $tanggal_transaksi,
                'status' => 'pending',
                'status_pembayaran' => 'belum'
            ]
        );
        // $data->save();
        $routes = '/viewuser/'.$request->id_user;
        return redirect($routes)->with('success', 'Checkout berhasil');

    }

    public function viewUser($id){
        $data = Data_pemesanan::all()->where('id_user', $id)->wherein('status', ['pending','dikemas','dikirim','selesai']);
        // $clook = now()->subDay($data->tenggat_pembayaran);
        return view('user.pesan.viewUser', compact('data'));
    }

    public function pesanBatal($id,Request $request, $user){

        $data = Data_pemesanan::find($id);

        $data->update([
            'catatan' => $request->catatan,
            'status' => 'batal',
        ]);
        $data->save();
        $routes = '/viewuser/' . $user;
        return redirect($routes)->with('success', 'Silahkan Menunggu Peroses');
    }

    public function pembatalan($id){
        $data = Data_pemesanan::all()->where('id_user', $id)->wherein('status', ['batal']);
        // $clook = now()->subDay($data->tenggat_pembayaran);
        return view('user.pesan.pembatalan', compact('data'));
    }
}
