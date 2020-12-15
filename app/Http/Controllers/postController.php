<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class postController extends Controller
{
  public function creat(Request $request){
    // validatorクラスのインスタンス作成、makeでrequestのqueryを指定
    // 第一引数でリクエストデータ、2で
    $validator = Validator::make($request->query(), [
      'id' => 'required',
      'pass' => 'required',
    ]);

    if ($validator->fails()){
      $msg = 'クエリーに問題あります';
    } else {
      $msg = 'id/passを受け取りましたフォーム入力';
    }

    return view('posts.creat', [
      'msg' => $msg,
    ]);
  }
  

  public function postValidation(Request $request)
  {
   // validatorクラスのインスタンス作成、makeでrequestのqueryを指定
    // 第一引数でリクエストデータ、2で検証ルールを配列にまとめる
    $messages = [
      'name.required' => '名前は必須です',
      'mail.email' => 'メール形式で入力して',
      'age.numeric' => '年齢は整数で',
      'age.between' => '0〜150で入力して'
    ];
    $rules = [
      'name' => 'required',
      'mail' => 'email',
      'age' => 'numeric|between:0,150',
    ];
    
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()){
      return redirect('creat')->withErrors($validator)->withInput();
  }
  }

  public function post()
  {
    $data = ['miki', 'jon', 'joes', 'josy', 'oksana', 'takosin'];
    
    return view('posts.creat', [
      'data' =>$data
    ]);
  }
}
