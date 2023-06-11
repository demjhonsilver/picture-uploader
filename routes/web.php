<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PicturesController;
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

/*
Route::get('/', function () {
    return view('welcome');
});

*/


Route::controller(PicturesController::class)->group(function () {
    Route::get('/','index')->name('pictures.index');
    Route::get('/pictures/upload','upload')->name('pictures.upload');
    Route::post('/pictures','store')->name('pictures.store');
    Route::get('/pictures/{id}','show');
    Route::put('/pictures/{id}','update')->name('pictures.update');
    Route::delete('/pictures/{id}','delete')->name('pictures.delete');
});


