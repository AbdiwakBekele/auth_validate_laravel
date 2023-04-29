<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
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
    return view('welcome');
});



Route::get('/login', [AuthManager::class, 'login'] )->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'] );

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registrationPost'] );

Route::get('/logout', [AuthManager::class, 'logout']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', function(){
        return view('home');
    });
});