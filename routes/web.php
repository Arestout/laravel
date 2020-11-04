<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsController as NewsAdminController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\Admin\UserController;

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

Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile')->middleware('auth');

Route::middleware(['auth', 'is_admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            Route::match(['get', 'post'], '/download', [NewsAdminController::class, 'download'])->name('download');
            Route::resource('/news', NewsAdminController::class)->except(['show']);
            Route::resource('/users', UserController::class);
            Route::post('/users/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status');
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
