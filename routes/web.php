<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostController2;
use App\Http\Controllers\CategoryController2;
use App\Http\Controllers\TagController2;
use App\Http\Controllers\SearchController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function() {
//     Route::get('/', [MainController::class, 'index'])->name('admin.index');
//     // Route::resource('/categories', 'CategoryController');
// });

Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);
});

Route::group(['middleware'=>'guest'], function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
});

Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/', [PostController2::class, 'index'])->name('home');
Route::get('/article/{slug}', [PostController2::class, 'show'])->name('posts.single');
Route::get('/category/{slug}', [CategoryController2::class, 'show'])->name('categories.single');
Route::get('/tag/{slug}', [TagController2::class, 'show'])->name('tags.single');
Route::get('/search', [SearchController::class, 'index'])->name('search');
