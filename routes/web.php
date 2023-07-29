<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TodoListController::class,'index']);
Route::post('/markCompleteRoute/{id}', [TodoListController::class,'markComplete'])->name('markComplete');
Route::post('/markDeleteRoute/{id}', [TodoListController::class,'markDelete'])->name('markDelete');

Route::post('/saveItemRoute', [TodoListController::class,'saveItem'])->name('saveItem');

Route::get('/login', [UserController::class,'loginmethod'])->name('loginmethod');

Route::post('/loginOrRegister', [UserController::class,'get_loginCredentials'])->name('loginOrRegister');

Route::get('/home', [UserController::class, 'home_view'])->name('home_view');
Route::get('/register', [UserController::class, 'Register'])->name('register');

