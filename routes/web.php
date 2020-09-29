<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\News\NewsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about');

Route::name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
            Route::get('/test2', [IndexController::class, 'test2'])->name('test2');
        }
    );

Route::name('news.')
    ->prefix('news')
    ->group(
        function () {
            Route::get('/', [NewsController::class, 'index'])->name('news');
            Route::get('/category', [NewsController::class, 'showCategories'])->name('categories');
            Route::get('/category/{category}', [NewsController::class, 'showCategoryById'])->name('categoryOne');
            Route::get('/category/{category}/{news}', [NewsController::class, 'showNewsById'])->name('newsOne');
        }
    );
