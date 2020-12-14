<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
  public function creat(Request $request){
    //viewの第二引数では、配列に指定したキーを変数として渡すことができる
    return view('posts.creat', [
      'msg' => 'フォームを入力:'
    ]);
  }

  public function postValidation(Request $request)
  {
     $validate_rule = [
       'name' => 'required',
       'mail' => 'email',
       'age' => 'numeric|between:0,150',
     ];
     $this->validate($request, $validate_rule);
     return view('posts.creat', [
      'msg' => 'フォームが正しく入力されました！'   
     ]);
  }

  public function post()
  {
    $data = ['miki', 'jon', 'joes', 'josy', 'oksana', 'takosin'];
    
    return view('posts.creat', [
      'data' =>$data
    ]);
  }
}
