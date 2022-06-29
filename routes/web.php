<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//Hanya yang sudah login yang bisa mengakses ini
Route::middleware('auth')->group(function () {
    Route::get('/list-artikel', [DashboardController::class, 'listArtikel'])->name('listArtikel');
    Route::post('/add/artikel', [DashboardController::class, 'addArtikel'])->name('addArtikel');
    Route::get('/artikel/{artikel:id}', [DashboardController::class, 'getArtikel'])->name('getArtikel');
    Route::patch('/artikel/{artikel:id}/update', [DashboardController::class, 'updateArtikel'])->name('updateArtikel');
    Route::delete('/delete/{artikel:id}/artikel', [DashboardController::class, 'destroyArtikel'])->name('destroyArtikel');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/genre', [DashboardController::class, 'getGenre'])->name('getgenre');
    Route::post('/add/genre', [DashboardController::class, 'addGenre'])->name('addgenre');
    Route::get('/genre/{genre:id}', [DashboardController::class, 'editGenre'])->name('editGenre');
    Route::patch('/genre/{genre:id}/update', [DashboardController::class, 'updateGenre'])->name('updateGenre');
    Route::delete('/delete/{genre:id}/genre', [DashboardController::class, 'destroyGenre'])->name('destroyGenre');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'getRegister'])->name('getRegister');
    Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');
});
Route::get('/', [BlogController::class, 'index'])->name('/');
Route::get('/detail/{artikel:id}', [BlogController::class, 'detail'])->name('detail');
