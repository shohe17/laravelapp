<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
    // makeの1引数は確認する値、2はルールの配列
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'mail' => 'email',
      'age' => 'numeric|between:0,150',
    ]);

    // failsはvalidation処理に失敗したかどうが検証するメソッド
    if ($validator->fails()){
      // エラーじはcreatにリダイレクト
      // withErrorsは引数にvalidatorインスタンスを渡し、エラーメッセージをリダイレクトに引き継ぐ
      // withInputは入力情報（送信されたフォームの値）を引き継がせる
      return redirect('creat')->withErrors($validator)->withInput();
    }
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
