<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Data_pemesanan;
use App\Models\Data_barang;
use App\Models\Pengirim;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(){
        $data = Data_pemesanan::all()->wherein('status', ['pending','dikemas','dikirim','selesai']);
        $user = Admin::all();
        $barang = Data_barang::all();
        return view('admin.admin1.pesanan.pesan', ['data' => $data], ['user' => $user], ['barang' => $barang]);
    }

    public function batalPesan(){
        $data = Data_pemesanan::all()->where('status', 'batal');
        $user = Admin::all();
        $barang = Data_barang::all();
        return view('admin.admin1.pesanan.batal', ['data' => $data], ['user' => $user], ['barang' => $barang]);
    }

    public function AccPembatalan($id){
        $data = Data_pemesanan::find($id);

        $data->update([
            'status' => 'dibatalkan',
        ]);
        $data->save();
        return redirect()->route('pesanan.batal')->with('success', 'Pesanan Berhasil Dibatalkan');
    }

    public function NonAcc($id){
        $data = Data_pemesanan::find($id);

        $data->update([
            'status' => 'pending',
        ]);
        $data->save();
        return redirect()->route('pesanan.batal')->with('success', 'Pesanan Di Pending Kembali dan Masuk Ke Table Pesanan');
    }

    public function view($id){
        $data = Data_pemesanan::find($id);
        $id_barang = $data->id_barang;
        $barang = Data_barang::find($id_barang);
        $id_user = $data->id_user;
        $user = Admin::find($id_user);
        $pengirim = Pengirim::all();
        $id_pengirim = $data->id_pengirim;
        $pengirim1 = Pengirim::find($id_pengirim);
        return view('admin.admin1.pesanan.view', compact('data', 'barang', 'user', 'pengirim', 'pengirim1'));
    }

    public function update(Request $request, $id){
        // $data = $request->all();

        // dd($request->pengirim);

        $request->validate([
            'status' => 'nullable',
            'pengirim' => 'nullable',
            'status_pembayaran' => 'nullable',
        ]);
        // $pengirim = Pengirim::find($request->pengirim);
        // dd($request->status_pembayaran);
        $data = Data_pemesanan::find($id);
        // dd($request->all());

        $data->update([
            'status' => $request->status,
            'id_pengirim' => $request->pengirim,
            'status_pembayaran' => $request->status_pembayaran,
        ]);
        // $data->id_pengirim = $pengirim->id;
        // $data->status = $request->status;
        // $data->status_pembayaran = $request->status_pembayaran;
        // $data->save();

        return redirect()->route('pesanan')->with('success', 'Data berhasil diupdate');
    }
}
