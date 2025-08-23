<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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
Route::get('/', [ContactController::class, 'index']);

Route::post('/confirm', [ContactController::class, 'confirm']);

Route::post('/thanks', [ContactController::class, 'store'])->name('thanks');

Route::get('/thanks', [ContactController::class, 'thanks']);

Route::get('/admin', [ContactController::class, 'adminList'])
    ->middleware('auth')
    ->name('admin.index');

Route::get('/admin/export',[AdminController::class, 'export'])
    ->middleware('auth')
    ->name('admin.export');

Route::get('/admin/{id}', [ContactController::class, 'show'])
    ->middleware('auth')
    ->name('admin.show');

Route::delete('/admin/{id}', [ContactController::class, 'destroy']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'store']);