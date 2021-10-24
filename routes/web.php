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

Route::get('/', "AdminController@index");
Route::post('/login', 'AdminController@login')->name("login");
Route::get('/logout', 'AdminController@logout')->name("logout");
Route::post('/setstatusproduct', 'ProductController@setstatusproduct')->name("setstatusproduct");
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
Route::post('/kasir/editcart', "KasirController@editcart")->name("editcart");
Route::get('/kasir/getcart', 'KasirController@getcart')->name("getcart");
Route::get('/kasir/gettableproduct', 'KasirController@gettableproduct')->name("gettableproduct");
Route::get('/kasir/getsummary', 'KasirController@getsummary')->name("getsummary");
Route::post('/kasir/createinvoice', "KasirController@createinvoice")->name("createinvoice");
Route::get('/transactionreturn/getitem', "ReturController@getitem")->name("getitem");
Route::post('/transactionreturn/addretur', "ReturController@addretur")->name("addretur");
Route::post('/transactionreturn/editretur', "ReturController@editretur")->name("editretur");
Route::post('/transactionreturn/confirmretur', "ReturController@confirmretur")->name("confirmretur");
Route::post('/transactionreturn/cancelretur', "ReturController@cancelretur")->name("cancelretur");
Route::get('/transactionreturn/gettablereturfinish', 'ReturController@getdatafinish')->name("gettablereturfinish");
Route::get('/transactionreturn/gettablereturprocess', 'ReturController@getdatainprogress')->name("gettablereturprocess");
Route::get('/invoice/getmydata', 'NotaController@getmydata')->name("gettableinvoice");
Route::get('/invoice/getdatedata', 'NotaController@getdateinvoice')->name("getdateinvoice");
Route::get('invoice/detail/{id}', 'NotaController@getmydetaildata')->name("getinvoicedetail");
// Route::get('/admin', "AdminController@index");
Route::resource('/dashboard', 'IndexController');
Route::resource('/product', 'ProductController');
Route::resource('/supplier', 'SupplierController');
Route::resource('/invoice', 'NotaController');
Route::resource('/cashier', 'KasirController');
Route::resource('/pricelist', 'PriceListController');
Route::resource('/transactionreturn', 'ReturController');
Route::resource('/stok', 'StokController');

