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

Auth::routes();
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/{post}', [\App\Http\Controllers\AdminPostsController::class, 'show'])->name('posts.home');

Route::middleware('auth')->group(function (){

    Route::middleware('admin')->group(function (){

        Route::get('/admin', function (){return view('admin.index');})->name('index');

        Route::resource('/admin/users', \App\Http\Controllers\AdminUsersController::class);
        Route::resource('/admin/posts', \App\Http\Controllers\AdminPostsController::class);
        Route::resource('/admin/categories', \App\Http\Controllers\AdminCategoriesController::class);
        Route::resource('/admin/media', \App\Http\Controllers\AdminMediasController::class);
        Route::resource('/admin/comment/replies', \App\Http\Controllers\CommentRepliesController::class);
        Route::resource('/admin/comments', \App\Http\Controllers\PostCommentsController::class) ;

    });
        Route::resource('/admin/comments', \App\Http\Controllers\PostCommentsController::class, ['only'=>'store']);
});
