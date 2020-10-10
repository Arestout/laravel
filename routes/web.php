<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NewsController as NewsAdminController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\CategoryController;

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
Route::view('/about', 'about')->name('about');

Route::name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            Route::get('/', [NewsAdminController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/publish', [NewsAdminController::class, 'publish'])->name('publish');
            Route::match(['get', 'post'], '/download', [NewsAdminController::class, 'download'])->name('download');
            Route::get('/edit/{news}', [NewsAdminController::class, 'edit'])->name('edit');
            Route::post('/update/{news}', [NewsAdminController::class, 'update'])->name('update');
            Route::get('/destroy/{news}', [NewsAdminController::class, 'destroy'])->name('destroy');
        }
    );

Route::name('news.')
    ->prefix('news')
    ->group(
        function () {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
            Route::get('/one/{news}', [NewsController::class, 'showNewsById'])->name('one');
        }
    );

Auth::routes();
