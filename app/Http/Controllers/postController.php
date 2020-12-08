<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
  public function creat(){
    //変数に連想配列、キーがmsgの値を代入
    $data = [
      'msg' => 'bladeの練習、下段には今日の日付が表示'
    ];
    //viewの第二引数では、配列に指定したキーを変数として渡すことができる
    return view('posts.creat', $data);
  }

  public function post()
  {

    return view('posts.creat');
  }
}
