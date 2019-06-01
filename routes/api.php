<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//////AKUN\\\\\\
Route::post('akun', 'AkunController@store');
Route::get('akun', 'AkunController@index');
Route::get('akun/{id}', 'AkunController@show');
Route::put('akun/{id}', 'AkunController@update');
Route::delete('akun/{id}', 'AkunController@delete');
//////AUTH\\\\\\
Route::post('auth/login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
  Route::get('auth/user', 'AuthController@user');
  Route::post('auth/logout', 'AuthController@logout');
});
Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::get('auth/refresh', 'AuthController@refresh');
});
//////CABANG\\\\\\
Route::get('cabang', 'CabangController@index');
Route::get('cabangAll', 'CabangController@getAll');
Route::get('cabang/{id}', 'CabangController@show');
Route::post('cabang', 'CabangController@store');
Route::put('cabang/{id}', 'CabangController@update');
Route::delete('cabang/{id}', 'CabangController@delete');
//////JASA SERVICE\\\\\\
Route::get('jasaservice', 'JasaServiceController@index');
Route::get('jasaserviceall', 'JasaServiceController@getall');
Route::get('jasaservice/{id}', 'JasaServiceController@show');
Route::post('jasaservice', 'JasaServiceController@store');
Route::put('jasaservice/{id}', 'JasaServiceController@update');
Route::delete('jasaservice/{id}', 'JasaServiceController@delete');
//////MOTOR\\\\\\
Route::get('motor', 'MotorController@index');
Route::get('motormain', 'MotorController@getindex');
Route::get('motor/{id}', 'MotorController@show');
Route::get('motorpelanggan/{id}', 'MotorController@getMotorPelanggan');
Route::post('motor', 'MotorController@store');
Route::put('motor/{id}', 'MotorController@update');
Route::delete('motor/{id}', 'MotorController@delete');
//////Pelanggan\\\\\\
Route::get('pelanggan', 'PelangganController@index');
Route::get('pelangganAll', 'PelangganController@getAll');
Route::get('pelanggan/{id}', 'PelangganController@show');
Route::post('pelanggan', 'PelangganController@store');
Route::put('pelanggan/{id}', 'PelangganController@update');
Route::delete('pelanggan/{id}', 'PelangganController@delete');
//////Pegawai\\\\\\
Route::get('pegawai', 'PegawaiController@index');
Route::get('pegawaiAll', 'PegawaiController@getAll');
Route::get('pegawai/{id}', 'PegawaiController@show');
Route::get('pegawaibyrole/{id}', 'PegawaiController@showbyRole');
Route::post('pegawai', 'PegawaiController@store');
Route::put('pegawai/{id}', 'PegawaiController@update');
Route::delete('pegawai/{id}', 'PegawaiController@delete');
//////Sparepart\\\\\\
Route::get('sparepart', 'SparepartController@index');
Route::get('sparepartall', 'SparepartController@getall');
Route::get('sparepartbyhargadesc', 'SparepartController@byHargaDESC');
Route::get('sparepartbyhargaasc', 'SparepartController@byHargaASC');
Route::get('sparepartbystokdesc', 'SparepartController@byStokDESC');
Route::get('sparepartbystokasc', 'SparepartController@byStokASC');
Route::get('sparepart/{id}', 'SparepartController@show');
Route::post('sparepart', 'SparepartController@store');
Route::put('sparepart/{id}', 'SparepartController@update');
Route::delete('sparepart/{id}', 'SparepartController@delete');
//////Supplier\\\\\\
Route::get('supplier', 'SupplierController@index');
Route::get('supplierAll', 'SupplierController@getAll');
Route::get('supplier/{id}', 'SupplierController@show');
Route::post('supplier', 'SupplierController@store');
Route::put('supplier/{id}', 'SupplierController@update');
Route::delete('supplier/{id}', 'SupplierController@delete');
//////Detail Motor\\\\\\
Route::get('detailmotor', 'DetailMotorController@index');
Route::get('detaillast', 'DetailMotorController@getLast');
Route::get('detailmotor/{id}', 'DetailMotorController@show');
Route::get('detailmotors/{transaksi}/{motor}', 'DetailMotorController@getdetail');
Route::post('detailmotors/{transaksi}/{motor}', 'DetailMotorController@post');
Route::post('detailmotor', 'DetailMotorController@store');
Route::put('detailmotor/{id}', 'DetailMotorController@update');
Route::delete('detailmotor/{id}', 'DetailMotorController@delete');
//////Detail Pengadaan\\\\\\
Route::get('detailpengadaan', 'DetailPengadaanController@index');
Route::get('detailpengadaan/{id}', 'DetailPengadaanController@show');
Route::post('detailpengadaan', 'DetailPengadaanController@store');
Route::put('detailpengadaan/{id}', 'DetailPengadaanController@update');
Route::delete('detailpengadaan/{id}', 'DetailPengadaanController@delete');
//////Detail Sparepart\\\\\\
Route::get('detailsparepart', 'DetailSparepartController@index');
Route::get('detailsparepart/{id}', 'DetailSparepartController@show');
Route::post('detailsparepart', 'DetailSparepartController@store');
Route::put('detailsparepart/{id}', 'DetailSparepartController@update');
Route::delete('detailsparepart/{id}', 'DetailSparepartController@delete');
//////Pembayaran\\\\\\
Route::get('pembayaran', 'PembayaranController@index');
Route::get('pembayaran/{id}', 'PembayaranController@show');
Route::post('pembayaran', 'PembayaranController@store');
Route::put('pembayaran/{id}', 'PembayaranController@update');
Route::delete('pembayaran/{id}', 'PembayaranController@delete');
//////Transaksi\\\\\\
Route::get('laporanstok/{tahun}/{tipe}', 'TransaksiController@laporanstok');
Route::get('laporanjasa/{tahun}/{bulan}', 'TransaksiController@laporanjasa');
Route::get('laporansparepartterlaris/{tahun}', 'TransaksiController@laporansparepartterlaris');
Route::get('laporanpendapatanpertahun/{tahun}', 'TransaksiController@laporanpendapatanpertahun');
Route::get('laporanpengeluaran/{tahun}', 'TransaksiController@laporanpengeluaran');
Route::get('laporanpendapatanpertahunbycabang', 'TransaksiController@laporanpendapatanpertahunbycabang');
Route::get('transaksi', 'TransaksiController@index');
Route::get('tampilservice', 'TransaksiController@tampilservice');
Route::get('servicebymotor/{nomor_polisi}/{nomor_pelanggan}', 'TransaksiController@servicebymotor');
Route::get('penjualanbymotor', 'TransaksiController@penjualanbynomor');
Route::get('transaksilast', 'TransaksiController@getLast');
Route::get('transaksi/{id}', 'TransaksiController@show');
Route::get('transaksilengkap/{id}', 'TransaksiController@showLengkap');
Route::post('history', 'TransaksiController@storeHistory');
Route::post('transaksi', 'TransaksiController@store');
Route::put('transaksi/{id}', 'TransaksiController@update');
Route::delete('transaksi/{id}', 'TransaksiController@delete');
//////Transaksi Pengadaan\\\\\\
Route::get('pengadaanlengkap/{id}', 'TransaksiPengadaanController@showLengkap');
Route::get('transaksipengadaan', 'TransaksiPengadaanController@index');
Route::get('pengadaan', 'TransaksiPengadaanController@NonSelesai');
Route::get('pengadaanlatest', 'TransaksiPengadaanController@getLatest');
Route::get('pengadaans', 'TransaksiPengadaanController@Selesai');
Route::get('transaksipengadaan/{id}', 'TransaksiPengadaanController@show');
Route::post('transaksipengadaan', 'TransaksiPengadaanController@store');
Route::put('transaksipengadaan/{id}', 'TransaksiPengadaanController@update');
Route::delete('transaksipengadaan/{id}', 'TransaksiPengadaanController@delete');
//////Transaksi Penjualan\\\\\\
Route::get('transaksipenjualan', 'TransaksiPenjualanController@index');
Route::get('transaksipenjualan/{id}', 'TransaksiPenjualanController@show');
Route::post('transaksipenjualan', 'TransaksiPenjualanController@store');
Route::put('transaksipenjualan/{id}', 'TransaksiPenjualanController@update');
Route::delete('transaksipenjualan/{id}', 'TransaksiPenjualanController@delete');
Route::get('transaksipenjualanlast', 'TransaksiPenjualanController@getLast');
//////Transaksi Service\\\\\\
Route::get('transaksiservice', 'TransaksiServiceController@index');
Route::get('transaksiservice/{id}', 'TransaksiServiceController@show');
Route::post('transaksiservice', 'TransaksiServiceController@store');
Route::post('transaksiservicebaru', 'TransaksiServiceController@storebaru');
Route::put('transaksiservice/{id}', 'TransaksiServiceController@update');
Route::delete('transaksiservice/{id}', 'TransaksiServiceController@delete');
Route::get('transaksiservicelast', 'TransaksiServiceController@getLast');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
