<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Tabel;
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

Route::get('/', [Dashboard::class, 'index']);
Route::get('/chart/data', [Dashboard::class, 'chart_data']);
Route::get('/tabel', [Tabel::class, 'index']);
Route::get('/tabel/data/{filter}', [Tabel::class, 'get_data']);
