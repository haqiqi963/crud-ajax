<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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
    return view('auth.login');
})->middleware('guest');

Auth::routes(['verify' => true]);



Route::middleware(['auth', 'verified', 'role:admin|user'])->group(function (){
    Route::get('/home', [HomeController::class, 'index']);

    Route::resource('users', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('roles', RoleController::class);
});


