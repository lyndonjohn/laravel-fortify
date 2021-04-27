<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/home', function () {
    $users = User::all();
    return view('home.dashboard', compact('users'));
})
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::get('/users/{user}', [UserController::class, 'edit'])
    ->name('users.edit')
    ->middleware(['auth', 'verified']);

Route::post('/users/{user}', [UserController::class, 'update'])
    ->name('users.edit')
    ->middleware(['auth', 'verified']);

Route::post('/users/delete/{user}', [UserController::class, 'destroy'])
    ->name('users.delete')
    ->middleware(['auth', 'verified']);
