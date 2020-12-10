<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
  public function creat(){
    //viewの第二引数では、配列に指定したキーを変数として渡すことができる
    return view('posts.creat', ['message' => 'Hello!']);
  }

  public function post()
  {
    $data = ['miki', 'jon', 'joes', 'josy', 'oksana', 'takosin'];
    
    return view('posts.creat', [
      'data' =>$data
    ]);
  }
}
