<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();
//Index Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Principal Page / Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//Route for edit contacts
Route::post('/editcontact', [App\Http\Controllers\HomeController::class, 'editContact'])->name('editContact')->middleware('auth');
//Route for create contacts
Route::get('/createcontact', [App\Http\Controllers\HomeController::class, 'editContact'])->name('createContact')->middleware('auth');
//Route for save contacts
Route::post('/savecontact', [App\Http\Controllers\HomeController::class, 'saveContact'])->name('saveContact')->middleware('auth');
//Route for delete contacts
Route::post('/deletecontact', [App\Http\Controllers\HomeController::class, 'deleteContact'])->name('deleteContact')->middleware('auth');
<<<<<<< Updated upstream
//Route for view contact
Route::post('/viewcontact', [App\Http\Controllers\HomeController::class, 'viewContact'])->name('viewContact')->middleware('auth');
=======

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> Stashed changes
