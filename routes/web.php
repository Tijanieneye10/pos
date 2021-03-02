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
Route::get('/printer',  [Printer::class, 'show'])->name('printer');
Route::post('/login',  [Login::class, 'store']);

Route::get('/', Home::class)->name('home')->middleware(['auth']);
Route::get('/products', Products::class)->middleware(['auth']);
Route::get('/sales', GetSales::class)->middleware(['auth'])->name('sales');
Route::get('/manage-user', Register::class)->middleware(['auth']);
Route::get('/change-password', ChangePassword::class)->middleware(['auth'])->name('changePassword');
Route::get('/product-category', Categories::class)->middleware(['auth'])->name('category');
Route::get('/products', Products::class)->middleware(['auth'])->name('products');
Route::get('/point-of-sales', PointOfSales::class)->middleware(['auth'])->name('pos');
Route::get('/view-sales/{invoice}', ViewSales::class)->middleware(['auth'])->name('viewSales');
Route::get('/expenses', Expenses::class)->middleware(['auth'])->name('expenses');
