<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

Route::get('/',[PropertyController::class, 'index'])->name('properties.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware'=>['auth']],function(){
Route::post('properties', [PropertyController::class, 'store'])->name('properties.store');
Route::put('properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::get('properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::get('users/properties', [PropertyController::class, 'getPropertiesByOwner'])->name('properties.owner');
Route::delete('properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
Route::get('properties/edit/{property}', [PropertyController::class, 'edit'])->name('properties.edit');
Route::post('properties', [PropertyController::class, 'store'])->name('properties.store');


});


Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('properties/reservation/{property}', [PropertyController::class, 'makeReservation'])->name('properties.reservation');
Route::post('properties/{property}', [PropertyController::class, 'book'])->name('properties.book');





