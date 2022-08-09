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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('products.index');

    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('categories.index');

    Route::get('/sales', function () {
        return view('admin.sales');
    })->name('sales.index');

    Route::get('/audits', function () {
        return view('admin.audits');
    })->name('audits.index');

    Route::get('/suppliers', function () {
        return view('admin.suppliers');
    })->name('suppliers.index');

    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('reports.index');
});
