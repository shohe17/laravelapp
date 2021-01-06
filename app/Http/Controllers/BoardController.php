<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
  public function index(Request $request)
  {
    // userテーブルから5つづつデータを取り出す
    // DBtableでテーブル指定
   $items = DB::table('boards')->simplePaginate(3);
   return view('boards.index', ['items' => $items]); 
  }
  
  // 指定したidのレコード取得
  public function showCreateForm(Request $request)
  {
    // 2引数でparamに入ってる値を返す
    return view('boards.create');
  }

  public function create(Request $request)
  {
    $board = new Board();
    $form = $request->all();
    unset($form['_token']);
    $board->fill($form)->save();

    return redirect('/board');
  }
}
