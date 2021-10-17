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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/clients',App\Http\Livewire\Clients\Index::class)->middleware('auth')->name('clients.index');
Route::get('/clients/create',App\Http\Livewire\Clients\Form::class)->middleware('auth')->name('clients.create');
Route::get('/clients/{client}/edit',App\Http\Livewire\Clients\Form::class)->middleware('auth')->name('clients.edit');

Route::get('/cities',App\Http\Livewire\Cities\Index::class)->middleware('auth')->name('cities.index');
Route::get('/cities/create',App\Http\Livewire\Cities\Form::class)->middleware('auth')->name('cities.create');
Route::get('/cities/{city}/edit',App\Http\Livewire\Cities\Form::class)->middleware('auth')->name('cities.edit');

Route::get('/users',App\Http\Livewire\Users\Index::class)->middleware('auth')->name('users.index');
Route::get('/users/create',App\Http\Livewire\Users\Form::class)->middleware('auth')->name('users.create');
Route::get('/users/{user}/edit',App\Http\Livewire\Users\Form::class)->middleware('auth')->name('users.edit');

require __DIR__.'/auth.php';
