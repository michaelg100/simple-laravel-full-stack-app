<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

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

Route::get('/home', [ToDoListController::class, 'index']);

Route::post('/api/v1/saveItemRoute', [ToDoListController::class, 'saveItem'])->name('saveItem');

Route::post('/api/v1/markCompleteRoute/{id}', [ToDoListController::class, 'markComplete'])->name('markComplete');

Route::post('/api/v1/deleteItemRoute/{id}', [ToDoListController::class, 'deleteItem'])->name('deleteItem');

Route::post('/api/v1/updateItemRoute/', [ToDoListController::class, 'updateItem'])->name('updateItem');
