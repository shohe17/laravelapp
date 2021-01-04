<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
  public function index(Request $request)
  {
    // userテーブルのデータを全て取得
    $items = User::with('boards')->get();
    return view('boards.index', [
      // 取得した情報を含めてposts.indexに値を
      'items' => $items
    ]);
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