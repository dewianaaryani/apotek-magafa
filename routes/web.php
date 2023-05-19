<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\ReportController;
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
//     return view('layout.app');
// });

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('cashiers', CashierController::class);
Route::resource('managers', ManagerController::class);
Route::get('edit-stocks/{id}', [StockController::class , 'editStock'])->name('editStock');
Route::post('edit-stocks-post/{id}', [StockController::class , 'editStockPost'])->name('editStockPost');
Route::get('view-stocks/{id}', [StockController::class , 'viewStock'])->name('viewStock');
Route::post('view-stocks-post/{id}', [StockController::class , 'viewStockPost'])->name('viewStockPost');
Route::delete('delete-stocks-post/{id}', [StockController::class , 'deleteStockPost'])->name('deleteStockPost');
Route::resource('transactions', TransactionController::class);

Route::get('detailTransactions/{id}', [TransactionDetailController::class , 'addDetailTransaction'])->name('addDetailTransaction');
Route::get('createdetailTransactions/{id}', [TransactionDetailController::class , 'createDetailTransaction'])->name('createDetailTransaction');
Route::post('storedetailTransactions/{id}', [TransactionDetailController::class , 'storeDetailTransaction'])->name('storeDetailTransaction');
Route::get('payTransactions/{id}', [TransactionController::class, 'payTransaction'])->name('payTransaction');
Route::post('endTransactions/{id}', [TransactionController::class, 'endTransaction'])->name('endTransaction');
Route::get('printTransactions/{id}', [TransactionController::class, 'printTransaction'])->name('printTransaction');
Route::get('/', [ReportController::class, 'dashboard']);
Route::get('printReports', [ReportController::class, 'report'])->name('printReport');
Route::get('printStocks', [ReportController::class, 'stocks'])->name('printStocks');
