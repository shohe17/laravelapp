<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CreatMiddleware;
use App\Http\Controllers\BoardController;

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

// Route::get('/', function () {
//     //viewメソッドは引数で指定されたファイルを、viewフォルダの中から返す
//     return view('welcome');
// });


// 引数に利用するmiddlewareクラスを指定する
// middleware('helo')にアクセスしたときはkernel.phpのmiddlewarGroupのheloに登録してあるミドルウェアが実行される
Route::get('/', [postController::class, 'index'])->middleware('helo');
Route::get('creat/post', [postController::class, 'post']);
Route::post('creat', [postController::class, 'postValidation']);

Route::get('creat/add', [postController::class, 'add']);
Route::post('creat/add', [postController::class, 'Create']);

Route::get('creat/edit', [postController::class, 'edit']);
Route::post('creat/edit', [postController::class, 'update']);

Route::get('creat/delete', [postController::class, 'delete']);
Route::post('creat/delete', [postController::class, 'remove']);

Route::get('posts/show', [postController::class, 'show']);
Route::post('posts/show', [postController::class, 'show']);

Route::get('board', [BoardController::class, 'index']);

Route::get('board/create', [BoardController::class, 'showCreateForm']);
Route::post('board/create', [BoardController::class, 'create']);