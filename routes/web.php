<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesreportController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\TankgradeController;
use App\Http\Controllers\TanktypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\TankdeliveryController;
use App\Http\Controllers\TankreportController;

//auth
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'signout'])->name('logout');
Route::post('authenticate-login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::group(['middleware' => 'auth'], function () {
    //home
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [UserController::class, 'edit'])->name('edit');
        Route::put('update', [UserController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/product-price', 'as' => 'tankgrade.'], function () {
        Route::get('/', [TankgradeController::class, 'index'])->name('index');
        Route::get('/create', [TankgradeController::class, 'create'])->name('create');
        Route::post('/store', [TankgradeController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [TankgradeController::class, 'edit'])->name('edit');
        Route::put('update', [TankgradeController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [TankgradeController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => '/tanktype', 'as' => 'tanktype.'], function () {
        Route::get('/', [TanktypeController::class, 'index'])->name('index');
        Route::get('/create', [TanktypeController::class, 'create'])->name('create');
        Route::post('/store', [TanktypeController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [TanktypeController::class, 'edit'])->name('edit');
        Route::put('update', [TanktypeController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [TanktypeController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => '/tank', 'as' => 'tank.'], function () {
        Route::get('/', [TankController::class, 'index'])->name('index');
        Route::get('/create', [TankController::class, 'create'])->name('create');
        Route::post('/store', [TankController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [TankController::class, 'edit'])->name('edit');
        Route::put('update', [TankController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [TankController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => '/supplier', 'as' => 'supplier.'], function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('/create', [SupplierController::class, 'create'])->name('create');
        Route::post('/store', [SupplierController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [SupplierController::class, 'edit'])->name('edit');
        Route::put('update', [SupplierController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [SupplierController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => '/supply', 'as' => 'supply.'], function () {
        Route::get('/', [SupplyController::class, 'index'])->name('index');
        Route::get('/create', [SupplyController::class, 'create'])->name('create');
        Route::post('/store', [SupplyController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [SupplyController::class, 'edit'])->name('edit');
        Route::put('update', [SupplyController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [SupplyController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/isi-tank', 'as' => 'tankreport.'], function () {
        Route::get('/', [TankreportController::class, 'index'])->name('index');
        Route::get('/create', [TankreportController::class, 'create'])->name('create');
        Route::post('/store', [TankreportController::class, 'store'])->name('store');
        Route::get('/report', [TankreportController::class, 'report'])->name('report');

        // Route::get('edit/{id}/', [TankreportController::class, 'edit'])->name('edit');
        // Route::put('update', [TankreportController::class, 'update'])->name('update');
        // Route::get('/destroy/{id}', [TankreportController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => '/sales-report', 'as' => 'salesreport.'], function () {
        Route::get('/', [SalesreportController::class, 'index'])->name('index');
        Route::get('/create', [SalesreportController::class, 'create'])->name('create');
        Route::post('/store', [SalesreportController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [SalesreportController::class, 'edit'])->name('edit');
        Route::put('update', [SalesreportController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [SalesreportController::class, 'destroy'])->name('destroy');
        Route::get('/report', [SalesreportController::class, 'report'])->name('report');
    });

    Route::group(['prefix' => '/tank-delivery', 'as' => 'tankdelivery.'], function () {
        Route::get('/', [TankdeliveryController::class, 'index'])->name('index');
        Route::get('/create', [TankdeliveryController::class, 'create'])->name('create');
        Route::post('/store', [TankdeliveryController::class, 'store'])->name('store');
        Route::get('edit/{id}/', [TankdeliveryController::class, 'edit'])->name('edit');
        Route::put('update', [TankdeliveryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [TankdeliveryController::class, 'destroy'])->name('destroy');
    });
});
