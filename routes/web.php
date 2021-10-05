<?php

use App\Http\Controllers\ManageController;
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
Route::get('/',[ManageController::class, 'index']);
Route::post('/manage/create', [ManageController::class, 'store'])->name('manage.create');
Route::post('/manage/update', [ManageController::class, 'update'])->name('manage.update');
Route::post('/manage/delete', [ManageController::class, 'destroy'])->name('manage.delete');
Route::post('/manage/search', [ManageController::class, 'show']);
