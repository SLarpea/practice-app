<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Localization;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return to_route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::post('setLocale', [Localization::class, 'setLocale'])->name('change.locale');

    Route::resource('authors', AuthorController::class)->middleware(['authors.index' => 'permission:view authors']);
});

Route::get('admin-lte', function () {
    return Inertia::render('AdminLTE');
})->name('admin.lte');
