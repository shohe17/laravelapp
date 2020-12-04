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

//第一の必須パラメータの後ろに?をつけ、$msgを定義すると
//必須パラメータがない場合にno messgaという文字列が表示される
Route::get('posts/{msg?}', function ($msg='no message') {
//第一引数で必須パラメータ{msg}を指定し、2でクロージャ（無名関数）に$msgを入れる
//そうすれば$msgの中に必須パラメータの値が入る
$html = <<<EOF
<html>
<body>
<h2>以下は渡されている必須パラメーター</h2>
<h2>{$msg}</h2>
</body>
</html>
EOF;
 return $html;
});
// //必須パラメーターの渡し方
// Route::get('posts/{id}', function ($id) {
//   return 'Post' .$id;
// });

Route::get('posts/{id}', [PostController::class, 'getParameter'])->name('posts.parameter');

