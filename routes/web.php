<?php

use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     //viewメソッドは引数で指定されたファイルを、viewフォルダの中から返す
//     return view('welcome');
// });

Route::get('posts/{msg}', function ($msg) {
  //viewメソッドは引数で指定されたファイルを、viewフォルダの中から返す

$html = <<<EOF
<html>
<head>
<body>
<h1>こんにちは</h1>
<h2>{$msg}</h2>
</body>
</head>
</html>
EOF;
 return $html;
});
// //必須パラメーターの渡し方
// Route::get('posts/{id}', function ($id) {
//   return 'Post' .$id;
// });

Route::get('posts/{id}', [PostController::class, 'getParameter'])->name('posts.parameter');

