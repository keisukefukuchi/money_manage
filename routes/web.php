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
Route::post('/manage/create', [ManageController::class, 'create'])->name('manage.create');
// Route::get('/manage/search', [ManageController::class, 'search'])->name('manage.search');
Route::post('/manage/update', [ManageController::class, 'update'])->name('manage.update');
Route::post('/manage/delete', [ManageController::class, 'delete'])->name('manage.delete');
// Route::get('/manage/find',[ManageController::class,'index']);
