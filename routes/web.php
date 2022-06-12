<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OtdelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\RegisterController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('/users', [UserController::class, 'index'])->middleware(['auth'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show')->missing(function (Request $request) {
    return Redirect::route('user.index');
});
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.delete');

//Route::get('/users/{user}/add_image', [UserController::class, 'addImage'])->name('user.add_image');
//Route::post('/users', [UserController::class, 'storeImage'])->name('user.store_image');

Route::get('/otdels', [OtdelController::class, 'index'])->middleware(['auth'])->name('otdel.index');
Route::get('/otdels/create', [OtdelController::class, 'create'])->name('otdel.create');
Route::post('/otdels', [OtdelController::class, 'store'])->name('otdel.store');
Route::get('/otdels/{otdel}', [OtdelController::class, 'show'])
    ->name('otdel.show')
    ->missing(function (Request $request) {
        return Redirect::route('otdel.index');
    });
Route::get('/otdels/{otdel}/edit', [OtdelController::class, 'edit'])->name('otdel.edit');
Route::patch('/otdels/{otdel}', [OtdelController::class, 'update'])->name('otdel.update');
Route::delete('/otdels/{otdel}', [OtdelController::class, 'destroy'])->name('otdel.delete');

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('post.show')
    ->missing(function (Request $request) {
        return Redirect::route('post.index');
    });
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/app', [\App\Http\Controllers\AppController::class, 'index'])->name('app.index');

