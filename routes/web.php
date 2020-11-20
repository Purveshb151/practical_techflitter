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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
	Route::get('inbox',[App\Http\Controllers\MailPracticalController::class, 'index'])->name('compose.inbox');
	Route::get('inbox/readorunread',[App\Http\Controllers\MailPracticalController::class, 'readorunread'])->name('compose.readorunread');
	Route::get('inbox/edit/{id}', [App\Http\Controllers\MailPracticalController::class, 'edit'])->name('compose.edit');
	Route::post('inbox/update',[App\Http\Controllers\MailPracticalController::class, 'update'])->name('compose.update');

	Route::get('compose',[App\Http\Controllers\MailPracticalController::class, 'create'])->name('compose.create');
	Route::post('compose/store',[App\Http\Controllers\MailPracticalController::class, 'store'])->name('compose.store');
	Route::get('sent',[App\Http\Controllers\MailPracticalController::class, 'sent'])->name('compose.sent');


	Route::get('user',[App\Http\Controllers\HomeController::class, 'index'])->name('user.index');
	Route::get('user/array',[App\Http\Controllers\HomeController::class, 'userarray'])->name('user.array');

});