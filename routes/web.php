<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReportController;
use App\Models\Sale;
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
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');

    Route::get('/audits', [AuditController::class, 'index'])->name('audits.index');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');


    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf/{id}', [ReportController::class, 'download'])->name('reports.pdf');

    Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals.index');
});
