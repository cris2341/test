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

Route::get('/scraper', [\App\Http\Controllers\ScraperController::class, 'scraper'])->name('scraper');

Route::get('/ajax_search',[\App\Http\Controllers\AjaxSearchController::class, 'index']);
Route::get('/ajax_search/action',[\App\Http\Controllers\AjaxSearchController::class, 'action'])->name('ajax_search.action');
