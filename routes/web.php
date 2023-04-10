<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/',[TodoController::class,'index'])->name('todo');
Route::post('/store/todo',[TodoController::class,'storedata'])->name('todo.store');
Route::get('/delete/todo/{id}',[TodoController::class,'deletedata'])->name('todo.delete');