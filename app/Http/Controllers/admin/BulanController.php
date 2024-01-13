<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Data_pemesanan;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BulanController extends Controller
{
    public function januari()
    {
        $data = Data_pemesanan::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.januari', ['data' => $data]);
    }
    public function februari()
    {
        $data = Data_pemesanan::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.februari', ['data' => $data]);
    }
    public function maret()
    {
        $data = Data_pemesanan::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.maret', ['data' => $data]);
    }
    public function april()
    {
        $data = Data_pemesanan::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.april', ['data' => $data]);
    }
    public function mei()
    {
        $data = Data_pemesanan::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.mei', ['data' => $data]);
    }
    public function juni()
    {
        $data = Data_pemesanan::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.juni', ['data' => $data]);
    }
    public function juli()
    {
        $data = Data_pemesanan::whereMonth('created_at', 7)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.juli', ['data' => $data]);
    }
    public function agustus()
    {
        $data = Data_pemesanan::whereMonth('created_at', 8)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.agustus', ['data' => $data]);
    }
    public function september()
    {
        $data = Data_pemesanan::whereMonth('created_at', 9)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.september', ['data' => $data]);
    }
    public function oktober()
    {
        $data = Data_pemesanan::whereMonth('created_at', 10)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.oktober', ['data' => $data]);
    }
    public function november()
    {
        $data = Data_pemesanan::whereMonth('created_at', 11)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.november', ['data' => $data]);
    }
    public function desember()
    {
        $data = Data_pemesanan::whereMonth('created_at', 12)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        // dd($data);
        return view('admin.admin1.bulan.desember', ['data' => $data]);
    }
    public function desemberCSV()
    {
        $data = Data_pemesanan::whereMonth('created_at', 12)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'desember.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function januariCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'januari.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function februariCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'februari.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function maretCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'maret.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function aprilCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'april.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function meiCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'mei.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function juniCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'juni.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function juliCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 7)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'juli.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function agustusCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 87)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'agustus.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function septemberCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 9)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'september.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }

    public function oktoberCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 10)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'oktober.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);

    }

    public function novemberCSV(){
        $data = Data_pemesanan::whereMonth('created_at', 11)->whereYear('created_at', date('Y'))->where('status', 'selesai')->get();
        $csvName = 'november.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$csvName,
        ];
        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Nomor Teransaksi',
                'Nama',
                'Nama Barang',
                'Jumlah Beli',
                'Total Pembayaran',
                'Tanggal Transaksi',

            ]);

            foreach ($data as $data) {
                fputcsv($handle, [
                    $data->no_transaksi,
                    $data->nama_pemesan,
                    $data->pemesanan->nama_barang,
                    $data->jumlah_beli,
                    $data->total_harga,
                    $data->created_at,
                ]); // Add more fields as needed
            }

            fclose($handle);
        };
        return new StreamedResponse($callback, 200, $headers);
    }
}
