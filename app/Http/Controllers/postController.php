<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
  public function creat(){
    //変数に連想配列を入力=>の左がキーで、右が値
    $data = [
      ['name' => 'みき', 'mail' => 'mikimiki@aa'],
      ['name' => 'みか', 'mail' => 'mikamika@aa'],
      ['name' => 'みこ', 'mail' => 'mikimiki@aa'],

    ];
    //viewの第二引数では、配列に指定したキーを変数として渡すことができる
    return view('posts.creat', ['data' => $data]);
  }

  public function post()
  {
    $data = ['miki', 'jon', 'joes', 'josy', 'oksana', 'takosin'];
    
    return view('posts.creat', [
      'data' =>$data
    ]);
  }
}
