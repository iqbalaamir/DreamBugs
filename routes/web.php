<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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

Route::get('/', [DataController::class,'show']);

Route::post('data/save',[DataController::class,'store'])->name('data.save');
Route::post('data/fetch',[DataController::class,'fetch'])->name('data.fetch');
Route::post('data/edit',[DataController::class,'update'])->name('data.edit');
Route::post('data/destroy',[DataController::class,'destroy'])->name('data.delete');

