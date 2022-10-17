<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('category',function(){
    return response()->json('This is category');
})->middleware('auth:sanctum');

// api to return all the posts with json
Route::get('allPost',[PostController::class,'getAllPosts']);
