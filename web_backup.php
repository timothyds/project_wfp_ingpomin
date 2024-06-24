<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('template', function () {
//     return view('produk.index');
// });
Route::view('ajaxExample','hotel.ajax');

Route::resource('produk', ProductController::class);

Route::resource('hotel',HotelController::class);

Route::get('report/availableHotelRooms',[HotelController::class,'availableHotelRoom'])->name('reportShowHotel');
Route::get('report/hotel/avgPriceByHotelType',[HotelController::class,'avgPriceByHotelType'])->name('reportShowAvg');
Route::post("/hotel/showInfo",[HotelController::class, 'showInfo'])->name("hotels.showInfo");
Route::resource('transaction',TransactionController::class);
Route::post('transaction/showDataAjax/',[TransactionController::class,'showAjax'])->name('transaction.showAjax');
Route::resource('tipe',TypeController::class);
Route::resource('customer',CustomerController::class);
Route::post('customtype/getEditForm',[TypeController::class,'getEditForm'])->name('tipe.getEditForm');
Route::post('customtype/getEditFormB',[TypeController::class,'getEditFormB'])->name('tipe.getEditFormB');
Route::post('customtype/saveDataTD',[TypeController::class,'saveDataTD'])->name('tipe.saveDataTD');
Route::post('customtype/deleteData',[TypeController::class,'deleteData'])->name('tipe.deleteData');
Route::post('customcustomer/getEditFormB',[CustomerController::class,'getEditFormB'])->name('customer.getEditFormB');
Route::post('customcustomer/saveDataTD',[CustomerController::class,'saveDataTD'])->name('customer.saveDataTD');
Route::post('customcustomer/deleteData',[CustomerController::class,'deleteData'])->name('customer.deleteData');
Route::post('customproduk/getEditFormB',[ProductController::class,'getEditFormB'])->name('produk.getEditFormB');
Route::post('customproduk/saveDataTD',[ProductController::class,'saveDataTD'])->name('produk.saveDataTD');
Route::post('customproduk/deleteData',[ProductController::class,'deleteData'])->name('produk.deleteData');
Route::post('customtrans/getEditFormB',[TransactionController::class,'getEditFormB'])->name('transaction.getEditFormB');
Route::post('customtrans/saveDataTD',[TransactionController::class,'saveDataTD'])->name('transaction.saveDataTD');
Route::post('customtrans/deleteData',[TransactionController::class,'deleteData'])->name('transaction.deleteData');




