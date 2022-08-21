<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [PostController::class, 'index']);

Route::get('post/details/{id}', [PostController::class,'show']);

Route::get('login', function(){
    return view('login');
});

Route::get('admin/post/add', function(){

    return view('admin.posts.add');

});

Route::post('post/store', [PostController::class, 'store']);
Route::get('admin/posts', [PostController::class, 'adminIndex']);
Route::get('post/edit/{id}', [PostController::class, 'edit']);
Route::post('post/update/{id}', [PostController::class, 'update']);
Route::get('post/delete/{id}',[PostController::class, 'delete']);
Route::get('admin/post/markasfeatured/{id}',[PostController::class, 'markAsFeatured']);
Route::get('admin/post/markasunfeatured/{id}',[PostController::class, 'markAsUnfeatured']);

/* categories */
Route::get('admin/categories',[CategoryController::class, 'index']);
Route::get('admin/category/add',[CategoryController::class, 'add']);
Route::post('admin/category/store',[CategoryController::class, 'store']);
Route::get('admin/category/delete/{id}',[CategoryController::class, 'delete']);

/* comments */
Route::post('comment/store', [CommentController::class,'store']);