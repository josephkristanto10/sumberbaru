<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('/getdatatable', 'ProductController@getjsons')->name("getdatatable");
Route::get('/getdatatableproductsupplier', 'SupplierController@getdatatableproductsupplier')->name("getdatatableproductsupplier");
Route::get('/getdatatablepricelistsupplier', 'PriceListController@getdatatablesupplier')->name("getdatatablesupplierpricelist");
Route::get('/getdatatablepersupplier/{id}', 'PriceListController@getdatatablepersupplier')->name("getdatatablepersupplier");
Route::get('/getdatatableproductpersupplier/{id}', 'SupplierController@getdatatableproductpersupplier')->name("getdatatableproductpersupplier");
Route::get('/supplier/productsupplier/{id}', 'SupplierController@indexproductsupplier');
Route::get('/pricelist/indexpricelist/{id}', 'PriceListController@indexpricelist');
Route::get('/pricelist/gethistoryproduct', 'PriceListController@gethistoryproduct')->name("gethistoryproduct");
Route::get('/pricelist/editprice/{id}','PriceListController@editpricelist');
Route::get('/stok/getdatatableproductlog', 'StokController@getdatatableproductlog')->name("getdatatableproductlog");
Route::get('/stok/getsupplieraddstocklog', 'StokController@getsupplieraddstocklog')->name("getsupplieraddstocklog");
Route::post('/stok/addstocklog', 'StokController@addstocklog')->name("addstocklog");
Route::post('/stok/gethistory', 'StokController@gethistory')->name("gethistory");
Route::post('/kasir/addcart', "KasirController@addcart")->name("addcart");
Route::post('/kasir/clearcart', "KasirController@clearcart")->name("clearcart");
Route::post('/kasir/createinvoice', "KasirController@createinvoice")->name("createinvoice");
Route::resource('/product', 'ProductController');
Route::resource('/supplier', 'SupplierController');
Route::resource('/invoice', 'NotaController');
Route::resource('/cashier', 'KasirController');
Route::resource('/pricelist', 'PriceListController');
Route::resource('/retur', 'ReturController');
Route::resource('/stok', 'StokController');

