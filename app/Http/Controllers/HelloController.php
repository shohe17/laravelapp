<?php
//クラスを階層的に整理するための仕組み
namespace App\Http\Controllers;
//クラスのインポート
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
  public function index(Request $request)
  {
    // userテーブルから5つづつデータを取り出す
    // DBtableでテーブル指定
   $items = DB::table('users')->simplePaginate(5);
   return view('posts.hello', ['items' => $items]); 
  }
}