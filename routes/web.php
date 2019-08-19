<?php

//use App\Http\Controllers\DataKlasifikasiController;

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
/*
Route::resource('user', 'UsersController');

Route::get('/users', function (UserDataTable $datatable) {
    return $datatable->render('users.index');
});


*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ini juga contoh

//Route::get('users-list', 'DatatablesController@list');

//buat contoh saja
//Route::get('data/all', 'CobaController@Alldata')->name('alluser');
//Route::resource('data', 'DatatablesController');

//Pembelian route
//route pemesanan pembelian

Route::get('/pemesananPembelian', 'PagesController@pemesananPembelian');
Route::get('/konfirmasipemesananPembelian', 'PagesController@konfirmasiPembelian');
Route::get('/diterimapemesananPembelian', 'PagesController@diterimaPembelian');
Route::get('/batalpemesananPembelian', 'PagesController@batalPembelian');

//Route::resource('/pesanpembelian', 'PemesanPembelianController');

Route::get('/penerimaanBarang', 'PagesController@penerimaanBarang');
Route::get('/konfirmasipenerimaanBarang', 'PagesController@konfirmasipenerimaanBarang');
Route::get('/returnPenerimaanBarang', 'PagesController@returnPenerimaanBarang');
Route::get('/konfirmasireturnPenerimaanBarang', 'PagesController@konfirmasiReturnPenerimaanBarang');

//route Penjualan
//route pemesanan penjualan
Route::get('/pemesananPenjualan', 'PemesananPenjualan@index');
Route::get('/pemesananPenjualan/create','PemesananPenjualan@create');


Route::get('/batalpemesananPenjualan', 'PagesController@batalPenjualan');

//route surat jalan
Route::get('/suratJalan', 'SuratJalanController@index');
Route::get('/suratJalan/create/{id}','SuratJalanController@create');
Route::post('/suratJalan/store/{id}','SuratJalanController@store');
Route::get('/suratJalan/show/{id}','SuratJalanController@show');
Route::post('/suratJalan/confirm/{id}','SuratJalanController@confirm');
Route::get('/konfirmasisuratJalan', 'SuratJalanController@konfirmasiSuratJalan');

//route return surat jalan
Route::get('/returnSuratJalan', 'PagesController@returnSuratJalan');
Route::get('/konfirmasireturnSuratJalan', 'PagesController@konfirmasiReturnSuratJalan');

//route penjualan langsung
Route::get('/penjualanLangsung', 'PagesController@penjualanLangsung');
//route return penjualan langsung
Route::get('/returnPenjualanLangsung', 'PagesController@returnPenjualanLangsung');

//ROUTE MASTER
// route menu
Route::get('/datagudang', 'DataGudangController@index');
Route::get('/datagudang/getdata','DataGudangController@getdata')->name('datagudang.getdata');
Route::get('/dataitem', 'DataItemController@index');
Route::get('/dataklasifikasi', 'DataKlasifikasiController@index');
Route::get('/datamatauang', 'DataMataUangController@index');
Route::resource('datapelanggan', 'DataPelangganController');
Route::get('/datapelanggan', 'DataPelangganController@index');
Route::get('/datasatuan', 'DataSatuanController@index');
Route::get('/datasupplier', 'DataSupplierController@index');
Route::get('/datakaryawan','KaryawanController@index');


//route dataItem
Route::get('/dataitem/create', 'DataItemController@create');
Route::post('/dataitem/store', 'DataItemController@store');
Route::get('/dataitem/satuan/create','DataItemKonversi@create');
Route::post('/dataitem/satuan/store','DataItemKonversi@store');

//route datagudang
Route::get('/datagudang/store', 'DataGudangController@store');
Route::get('/datagudang/create', 'DataGudangController@create');
Route::get('/datagudang/edit/{id}', 'DataGudangController@edit');
Route::get('/datagudang/show/{id}', 'DataGudangController@show');
Route::post('/datagudang/update/{id}', 'DataGudangController@update');
Route::get('/datagudang/destroy/{id}', 'DataGudangController@destroy');

//route Data pelanggan
Route::get('/datapelanggan/edit/{id}','DataPelangganController@edit');
Route::post('/datapelanggan/update/{id}', 'DataPelangganController@update');
Route::get('/datapelanggan/destroy/{id}', 'DataPelangganController@destroy');

//route dataklasifikasi
Route::get('/dataklasifikasi/store', 'DataKlasifikasiController@store');
Route::get('/dataklasifikasi/create', 'DataKlasifikasiController@create');
Route::get('/dataklasifikasi/edit/{id}', 'DataKlasifikasiController@edit');
Route::get('/dataklasifikasi/show', 'DataKlasifikasiController@show');
Route::post('/dataklasifikasi/update/{id}', 'DataKlasifikasiController@update');
Route::get('/dataklasifikasi/destroy/{id}', 'DataKlasifikasiController@destroy');

//route datamatauang
Route::get('/datamatauang/store', 'DataMataUangController@store');
Route::get('/datamatauang/create', 'DataMataUangController@create');
Route::get('/datamatauang/edit/{id}', 'DataMataUangController@edit');
Route::get('/datamatauang/show', 'DataMataUangController@show');
Route::post('/datamatauang/update/{id}', 'DataMataUangController@update');
Route::get('/datamatauang/destroy/{id}', 'DataMataUangController@destroy');
Route::get('/datamatauang/lihat', 'DataMataUangController@lihat');

//route datasatuan
Route::get('/datasatuan/store', 'DataSatuanController@store');
Route::get('/datasatuan/create', 'DataSatuanController@create');
Route::get('/datasatuan/edit/{id}', 'DataSatuanController@edit');
Route::get('/datasatuan/show', 'DataSatuanController@show');
Route::post('/datasatuan/update/{id}', 'DataSatuanController@update');
Route::get('/datasatuan/destroy/{id}', 'DataSatuanController@destroy');

//route datasupplier
Route::get('/datasupplier/store', 'DataSupplierController@store');
Route::get('/datasupplier/create', 'DataSupplierController@create');
Route::get('/datasupplier/edit/{id}', 'DataSupplierController@edit');
Route::get('/datasupplier/show', 'DataSupplierController@show');
Route::post('/datasupplier/update/{id}', 'DataSupplierController@update');
Route::get('/datasupplier/destroy/{id}', 'DataSupplierController@destroy');

//route data karyawan
Route::get('/datakaryawan/store', 'KaryawanController@store');
Route::get('/datakaryawan/create', 'KaryawanController@create');
Route::get('/datakaryawan/edit/{id}', 'KaryawanController@edit');
Route::get('/datakaryawan/show', 'KaryawanController@show');
Route::post('/datakaryawan/update/{id}', 'KaryawanController@update');
Route::get('/datakaryawan/destroy/{id}', 'KaryawanController@destroy');

//ROUTE PEMBELIAN
// route pemesananpembelian
Route::get('/popembelian', 'PemesananPembelianController@index');
Route::get('/pokonfirmasi', 'PemesananPembelianKonfirmasiController@index');
Route::get('/poditerima', 'PemesananPembelianDiterimaController@index');
Route::get('/pobatal', 'PemesananPembelianBatalController@index');

//route PO
Route::get('/popembelian/store', 'PemesananPembelianController@store');
Route::get('/popembelian/create', 'PemesananPembelianController@create');
Route::get('/popembelian/destroy/{id}', 'PemesananPembelianController@destroy');

// route pemesananpenjualan
Route::get('/sopenjualan', 'PemesananPenjualanController@index');
Route::get('/sokonfirmasi', 'PemesananPenjualanKonfirmasiController@index');
Route::get('/soditerima', 'PemesananPenjualanDiterimaController@index');
Route::get('/sobatal', 'PemesananPenjualanBatalController@index');

//route SO
Route::post('/sopenjualan/store', 'PemesananPenjualanController@store');
Route::get('/sopenjualan/create', 'PemesananPenjualanController@create');
Route::get('/sopenjualan/show/{id}','PemesananPenjualanController@show');
Route::get('/sopenjualan/destroy/{id}', 'PemesananPenjualanController@destroy');
Route::post('/sopenjualan/confirm/{id}', 'PemesananPenjualanController@confirm');

Route::get('/konfirmasipemesananPenjualan', 'PemesananPenjualanController@konfirmasiPenjualan');
Route::get('/dikirimpemesananPenjualan', 'PemesananPenjualanController@dikirimPenjualan');

//ROUTE STOK
Route::get('/stokmasuk','StokMasukController@index');
Route::get('/stokmasuk/create','StokMasukController@create');
Route::post('/stokmasuk/store','StokMasukController@store');


// route buat semua controller
// Route::resource('lokasi', 'DataGudangController');
// Route::resource('item', 'DataItemController');
// Route::resource('kategori', 'DataKlasifikasiController');
// Route::resource('matauang', 'DataMataUangController');
// Route::resource('pelanggan', 'DataPelangganController');
// Route::resource('satuan', 'DataSatuanController');
// Route::resource('supplier', 'DataSupplierController');
// Route::resource('PemesananPembelian', 'PemesananPembelianController');
// Route::resource('PemesananPenjualan', 'PemesananPenjualanController');
