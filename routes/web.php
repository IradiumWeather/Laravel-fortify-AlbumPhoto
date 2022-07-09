<?php

use App\Http\Controllers\IdentificationController;
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

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/add',[IdentificationController::class,'addImg'])->name('addImg');
    Route::post('/add',[IdentificationController::class,'uploads'])->name('imgUploads');
});

Route::get('/',[IdentificationController::class,'gallery'])->name('gallery');

Route::post('/logout', [IdentificationController::class,'logout'])->name('logout');
