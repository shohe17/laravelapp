<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
  public function index(Request $request)
  {
    // クエリー文字列の指定（今回の場合はtitileかmessageが requestに入る）
    $sort = $request->sort;
    // userテーブルから5つづつデータを取り出す
    // DBtableでテーブル指定
    $items = Board::orderBy($sort, 'asc')->simplePaginate(3);
    $param = ['items' => $items, 'sort' => $sort]; 
    return view('boards.index', $param); 
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
