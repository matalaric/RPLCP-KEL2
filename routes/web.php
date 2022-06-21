<?php

use App\Http\Controllers\Admin\DashboardAdminController;

use App\Http\Controllers\Consumen\DashboardConsumenController;

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', 'login');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // For Admin
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('dashboard-admin', DashboardAdminController::class);
    });

    // For Consumen
    Route::middleware(['is_consumen'])->group(function () {
        Route::resource('dashboard-consumen', DashboardConsumenController::class);
    });
});

