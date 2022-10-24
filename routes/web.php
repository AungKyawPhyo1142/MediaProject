<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendPostController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // go admin dashboard
    Route::get('dashboard',[ProfileController::class,'goDashboard'])->name('dashboard');
    Route::post('admin/update',[ProfileController::class,'updateData'])->name('admin#updateData');
    // change password
    Route::get('admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');
    Route::post('admin/changePassword',[ProfileController::class,'passwordChange'])->name('admin#passwordChange');

    // admin lists
    Route::get('admin/list',[ListController::class,'goAdminList'])->name('admin#list');
    Route::get('admin/list/delete/{id}',[ListController::class,'deleteData'])->name('admin#delete');
    Route::post('admin/list/search',[ListController::class,'searchData'])->name('admin#search');

    // category
    Route::get('category',[CategoryController::class,'showCategory'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::get('category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');
    Route::post('category/search',[CategoryController::class,'searchData'])->name('admin#searchCategory');
    Route::get('category/editPage/{id}',[CategoryController::class,'categoryEditPage'])->name('admin#categoryEditPage');
    Route::post('category/update/{id}',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');

    // posts
    Route::get('post',[PostController::class,'showPost'])->name('admin#post');
    Route::post('post/create',[PostController::class,'createPost'])->name('admin#postCreate');
    Route::get('post/delete/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
    Route::get('post/editPage/{id}',[PostController::class,'postUpdatePage'])->name('admin#postEditPage');
    Route::post('post/update/{id}',[PostController::class,'postUpdateData'])->name('admin#postUpdate');

    // trending post
    Route::get('trendpost',[TrendPostController::class,'showTrendPost'])->name('admin#trendPost');
    Route::get('trendpost/details/{id}/{post_count}',[TrendPostController::class,'showDetails'])->name('admin#trendPostDetails');
});
