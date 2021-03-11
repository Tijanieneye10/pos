<?php

use App\Http\Livewire\Home;
use App\Http\Controllers\Printer;
use App\Http\Controllers\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Sales\GetSales;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Sales\ViewSales;
use App\Http\Livewire\Expense\Expenses;
use App\Http\Livewire\Product\Products;
use App\Http\Livewire\Product\Categories;
use App\Http\Livewire\Sales\PointOfSales;
use App\Http\Livewire\Auth\ChangePassword;
use App\Http\Livewire\Sales\SalesExportRecords;
use App\Http\Livewire\Expense\ExpenseExportRecords;

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

Route::get('/login',  [Login::class, 'index'])->name('login');
Route::post('/login',  [Login::class, 'store']);
Route::get('/printer',  [Printer::class, 'show'])->name('printer');

Route::post('/sales-records-download',  [Printer::class, 'salesRecordsDownload'])
    ->name('salesRecordsDownload');
Route::post('/expenses-records-download',  [Printer::class, 'expensesRecordsDownload'])
    ->name('expensesRecordsDownload');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', Home::class)->name('home');
    Route::get('/products', Products::class);
    Route::get('/sales', GetSales::class)->name('sales');
    Route::get('/manage-user', Register::class);
    Route::get('/change-password', ChangePassword::class)->name('changePassword');
    Route::get('/product-category', Categories::class)->name('category');
    Route::get('/products', Products::class)->name('products');
    Route::get('/point-of-sales', PointOfSales::class)->name('pos');
    Route::get('/view-sales/{invoice}', ViewSales::class)->name('viewSales');
    Route::get('/export-sales', SalesExportRecords::class)->name('salesExport');
    Route::get('/expenses', Expenses::class)->name('expenses');
    Route::get('/expenses-records', ExpenseExportRecords::class)->name('expensesRecord');
});
