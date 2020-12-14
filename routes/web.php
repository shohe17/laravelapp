<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CreatMiddleware;

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


Route::get('posts/{id}', [PostController::class, 'getParameter'])->name('posts.parameter');
// 引数に利用するmiddlewareクラスを指定する
// middleware('helo')にアクセスしたときはkernel.phpのmiddlewarGroupのheloに登録してあるミドルウェアが実行される
Route::get('creat', [postController::class, 'creat'])->middleware('helo');
Route::get('creat/post', [postController::class, 'post'])->name('creat.post');
Route::post('creat', [postController::class, 'postValidation']);