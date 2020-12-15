<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatRequest;

class postController extends Controller
{
  public function creat(Request $request){
    //viewの第二引数では、配列に指定したキーを変数として渡すことができる
    return view('posts.creat', [
      'msg' => 'フォームを入力:'
    ]);
  }

  public function postValidation(CreatRequest $request)
  {

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
