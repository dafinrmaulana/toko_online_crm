<?php

use App\Events\ChatEvent;
use App\Http\Controllers\user\ChatController;
use Illuminate\Http\Request;

use App\Http\Controllers\admin\CreateuserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\UserAuthController;
use App\Http\Controllers\produk\CableController;
use App\Http\Controllers\produk\CctvController;
use App\Http\Controllers\produk\CpuController;
use App\Http\Controllers\produk\HardwareController;
use App\Http\Controllers\produk\MonitorController;
use App\Http\Controllers\produk\PcaController;
use App\Http\Controllers\produk\UpsController;
use App\Http\Controllers\user\dashboardController;
use App\Http\Controllers\user\PemesanController;
use App\Http\Controllers\user\ViewController;
use App\Http\Controllers\user\KeranjangController;
use App\Models\Admin;
use App\Models\Data_chat;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/', [dashboardController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/create', [CreateuserController::class, 'index'])->name('admin.create');
Route::post('/create', [CreateuserController::class, 'create']);
Route::group([
    'prefix' => config('user.user'),
    // 'namespace' => 'App\\Http\\Controllers',
], function(){
    Route::middleware('auth:user')->group(function(){

        Route::get('/dashboarduser', [dashboardController::class, 'index'])->name('dashboardUser');

    });
});
// Route::get('/', [dashboardController::class, 'index']);
// Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/create', 'admin\CreateuserController@index')->name('admin.create');
// Route::post('/create', 'admin\CreateuserController@create');

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => 'App\\Http\\Controllers',
], function () {



    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::get('/dashboard', 'admin\DashboardController@index')->name('dashboard');

        // user
        Route::get('/cctv', [CctvController::class, 'index'])->name('cctv');
        Route::get('/monitor', [MonitorController::class, 'index'])->name('monitor');
        Route::get('/cpu', [CpuController::class, 'index'])->name('cpu');
        Route::get('/hardware', [HardwareController::class, 'index'])->name('hardware');
        Route::get('cable', [CableController::class, 'index'])->name('cable');
        Route::get('ups', [UpsController::class, 'index'])->name('ups');
        Route::get('pca', [PcaController::class, 'index'])->name('pca');
        Route::get('/view/{id}', [ViewController::class, 'index'])->name('view');
        Route::get('/pemesanan/{id}', [PemesanController::class, 'index'])->name('pemesanan');
        Route::get('/viewuser/{id}', [PemesanController::class, 'viewUser'])->name('viewPesan');
        Route::post('/pembatalan/{id}/{user}', [PemesanController::class, 'pesanBatal']);
        Route::get('/pembatalan/{id}', [PemesanController::class, 'pembatalan']);
        Route::get('/keranjang/{user}', [KeranjangController::class, 'index']);
        Route::get('/chekout/{user}', [KeranjangController::class, 'checkOut']);
        Route::post('/checkout/{user}', [KeranjangController::class, 'update']);
        Route::post('/keranjang/{id}/{user}', [KeranjangController::class, 'create']);
        Route::post('/keranjang/delete/{id}/{user}', [KeranjangController::class, 'delete']);
        Route::post('/pemesanan/{id}', 'user\PemesanController@create');
        Route::get('/chat', 'user\ChatController@index')->name('chat');
        Route::post('/message', function(Request $request){
            $request->validate([
                'name'=>'required',
                'message'=>'required'
            ]);

            $user = Admin::select('nama')->where($request->name)->first();


            $message = Data_chat::create([
                'nama'=>$user,
                'message'=>$request->message
            ]);

            ChatEvent::dispatch($message);
        });

        // pimpinan
        Route::get('/laporan', 'admin\LaporanController@index')->name('laporan')->middleware('can:role,"admin","pimpinan"');


        // admin
        Route::get('/admin', 'admin\UserController@index')->name('admin')->middleware('can:role,"admin"');
        Route::get('/januari', 'admin\BulanController@januari')->name('admin.januari');
        Route::get('/februari', 'admin\BulanController@februari')->name('admin.februari');
        Route::get('/maret', 'admin\BulanController@maret')->name('admin.maret');
        Route::get('/april', 'admin\BulanController@april')->name('admin.april');
        Route::get('/mei', 'admin\BulanController@mei')->name('admin.mei');
        Route::get('/juni', 'admin\BulanController@juni')->name('admin.juni');
        Route::get('/juli', 'admin\BulanController@juli')->name('admin.juli');
        Route::get('/agustus', 'admin\BulanController@agustus')->name('admin.agustus');
        Route::get('/september', 'admin\BulanController@september')->name('admin.september');
        Route::get('/oktober', 'admin\BulanController@oktober')->name('admin.oktober');
        Route::get('/november', 'admin\BulanController@november')->name('admin.november');
        Route::get('/desember', 'admin\BulanController@desember')->name('admin.desember');

        // CSV
        Route::get('/januari/csv', 'admin\BulanController@januariCSV')->name('csv.januari');
        Route::get('/februari/csv', 'admin\BulanController@februariCSV')->name('csv.februari');
        Route::get('/maret/csv', 'admin\BulanController@maretCSV')->name('csv.maret');
        Route::get('/april/csv', 'admin\BulanController@aprilCSV')->name('csv.april');
        Route::get('/mei/csv', 'admin\BulanController@meiCSV')->name('csv.mei');
        Route::get('/juni/csv', 'admin\BulanController@juniCSV')->name('csv.juni');
        Route::get('/juli/csv', 'admin\BulanController@juliCSV')->name('csv.juli');
        Route::get('/agustus/csv', 'admin\BulanController@agustusCSV')->name('csv.agustus');
        Route::get('/september/csv', 'admin\BulanController@septemberCSV')->name('csv.september');
        Route::get('/oktober/csv', 'admin\BulanController@oktoberCSV')->name('csv.oktober');
        Route::get('/november/csv', 'admin\BulanController@novemberCSV')->name('csv.november');
        Route::get('/desember/csv', 'admin\BulanController@desemberCSV')->name('csv.desember');

        Route::get('/admin/edit/{id}', 'admin\CreateuserController@edit')->name('admin.edit');
        Route::post('/admin/edit/{id}', 'admin\CreateuserController@update');
        Route::get('/admin/delete/{id}', 'admin\CreateuserController@delete')->name('admin.delete')->middleware('can:role,"admin"');
        Route::get('/admin/restore/{id}', 'admin\CreateuserController@restore')->name('admin.restore')->middleware('can:role,"admin"');

        Route::get('/pengirim', 'admin\PengirimController@index')->name('pengirim');
        Route::get('/pengirim/create', 'admin\PengirimController@create')->name('pengirimCreate');
        Route::post('/pengirim/create', 'admin\PengirimController@store');
        Route::get('/pesanan', 'admin\PesananController@index')->name('pesanan');
        Route::get('/pesanan/batal', 'admin\PesananController@batalPesan')->name('pesanan.batal');
        Route::get('/pesanan/batal/{id}', 'admin\PesananController@AccPembatalan');
        Route::get('/pesanan/non/{id}', 'admin\PesananController@NonAcc');
        Route::get('/pesanan/view/{id}', 'admin\PesananController@view')->name('pesanan.view');
        Route::post('/pesanan/view/{id}', 'admin\PesananController@update');

        Route::get('/admin/produk', 'admin\ProdukController@index')->name('produk');
        Route::get('/produk/create', 'admin\ProdukController@create')->name('produkCreate');
        Route::post('/produk/create', 'admin\ProdukController@tambah');
        Route::get('/produk/delete/{id}', 'admin\ProdukController@delete');
        Route::get('/produk/edit/{id}', 'admin\ProdukController@edit')->name('edit.produk');
        Route::post('/produk/edit/{id}', 'admin\ProdukController@update');
        Route::get('/produk/view/{id}', 'admin\ProdukController@view');

        Route::prefix('ajax')->group(function () {
            // Route::get('chats', [ChatController::class, 'getChatUser'])->name('ajax.chat.user');
            // Route::post('chats', [ChatController::class, 'storeChatUser'])->name('ajax.chat.user.store');
            Route::get('chats/{user_id}', [ChatController::class, 'chats'])->name('ajax.chats.user');
            Route::post('chats', [ChatController::class, 'store'])->name('ajax.chats.store');
            Route::put('chats/{chat}', [ChatController::class, 'update'])->name('ajax.chats.update');
        });
    });
});
