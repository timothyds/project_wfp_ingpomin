<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Models\Hotel_Type;
use App\Models\Transaction;
use Database\Seeders\ProductTypeSeeder;
use Illuminate\Support\Facades\Auth;
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
Route::view('ajaxExample', 'hotel.ajax');

Route::get('/laralux', [FrontEndController::class, 'index'])->name('laralux.index');
Route::get('/laralux/{laralux}', [FrontEndController::class, 'show'])->name('laralux.show');


Route::get('report/availableHotelRooms', [HotelController::class, 'availableHotelRoom'])->name('reportShowHotel');
Route::get('report/hotel/avgPriceByHotelType', [HotelController::class, 'avgPriceByHotelType'])->name('reportShowAvg');
Route::post("/hotel/showInfo", [HotelController::class, 'showInfo'])->name("hotels.showInfo");

Route::post('transaction/showDataAjax/', [TransactionController::class, 'showAjax'])->name('transaction.showAjax');

Route::middleware(['auth'])->group(function () {
    Route::resource('tipe', HotelTypeController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('produk', ProductController::class);
    Route::resource('produkType', ProductTypeController::class);
    Route::resource('hotel', HotelController::class);
    Route::resource('facility', FacilityController::class);
    Route::get('laralux/user/cart', function () {
        return view('frontend.cart');
    })->name('cart');

    Route::get('laralux/cart/add/{id}', [FrontEndController::class, 'addToCart'])->name('addCart');

    Route::get('laralux/cart/delete/{id}', [FrontEndController::class, 'deleteFromCart'])->name('delFromCart');
    Route::post('laralux/cart/addQty', [FrontEndController::class, 'addQuantity'])->name('addQty');

    Route::post('laralux/cart/reduceQty', [FrontEndController::class, 'reduceQuantity'])->name('redQty');
    Route::post('laralux/cart/checkout', [FrontEndController::class, 'checkout'])->name('checkout');
});


Route::post('customtype/getEditForm', [HotelTypeController::class, 'getEditForm'])->name('tipe.getEditForm');
Route::post('customtype/getEditFormB', [HotelTypeController::class, 'getEditFormB'])->name('tipe.getEditFormB');
Route::post('customtype/saveDataTD', [HotelTypeController::class, 'saveDataTD'])->name('tipe.saveDataTD');
Route::post('customtype/deleteData', [HotelTypeController::class, 'deleteData'])->name('tipe.deleteData');
Route::post('customcustomer/getEditFormB', [CustomerController::class, 'getEditFormB'])->name('customer.getEditFormB');
Route::post('customcustomer/saveDataTD', [CustomerController::class, 'saveDataTD'])->name('customer.saveDataTD');
Route::post('customcustomer/deleteData', [CustomerController::class, 'deleteData'])->name('customer.deleteData');
Route::post('customproduk/getEditFormB', [ProductController::class, 'getEditFormB'])->name('produk.getEditFormB');
Route::post('customproduk/saveDataTD', [ProductController::class, 'saveDataTD'])->name('produk.saveDataTD');
Route::post('customproduk/deleteData', [ProductController::class, 'deleteData'])->name('produk.deleteData');
Route::post('customtrans/getEditFormB', [TransactionController::class, 'getEditFormB'])->name('transaction.getEditFormB');
Route::post('customtrans/saveDataTD', [TransactionController::class, 'saveDataTD'])->name('transaction.saveDataTD');
Route::post('customtrans/deleteData', [TransactionController::class, 'deleteData'])->name('transaction.deleteData');
Route::post('customfacility/getEditFormB', [FacilityController::class, 'getEditFormB'])->name('facility.getEditFormB');
Route::post('customfacility/saveDataTD', [FacilityController::class, 'saveDataTD'])->name('facility.saveDataTD');
Route::post('customfacility/deleteData', [FacilityController::class, 'deleteData'])->name('facility.deleteData');

Route::get('hotel/uploadLogo/{hotel_id}', [HotelController::class, 'uploadLogo']);
Route::post('produk/delPhoto', [ProductController::class, 'delPhoto']);
Route::get('produk/uploadPhoto/{product_id}', [ProductController::class, 'uploadPhoto']);
Route::post('produk/simpanPhoto', [ProductController::class, 'simpanPhoto']);
Route::post('hotel/simpanPhoto', [HotelController::class, 'simpanPhoto']);

Route::get('transactions/list', [TransactionController::class, 'showTransactions'])->name('showTransactionList');
Route::get('transactions/listcust', [TransactionController::class, 'showTransactionsCustomer'])->name('showTransactionListCust');
Route::get('transactions/receipt', [TransactionController::class, 'checkout'])->name('transaction.receipt');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
