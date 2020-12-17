<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
  public function creat(Request $request)
  {
    $items = DB::select('select * from user');
    return view('posts.creat', [
      'items' => $items
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
      'age.min' => '年齢は0以上です',
      'age.max' => '年齢は100以下です'
    ];

    $rules = [
      'name' => 'required',
      'mail' => 'email',
      'age' => 'numeric',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    // 新しいルールの追加をしている。0より小さく、100より大きい場合はエラー
    // sometimesの引数は、1項目、2ルール名、3クロージャでを表し、処理結果によって新しいルールの追加
    //  $inputは入力値（name,mail,age）がまとまったもの
    $validator->sometimes('age', 'min:0', function ($input) {
      // 引数3で!is?intの値（min:0のvalidation）を返している()内で受け取った値のなかのageを指定
      return !is_int($input->age);
    });

    $validator->sometimes('age', 'max:100', function ($input) {
      return !is_int($input->age);
    });

    if ($validator->fails()) {
      return redirect('creat')->withErrors($validator)->withInput();
    }
  }

  public function add(Request $request)
  {
    return view('posts.add');
  }

  public function registerCreat(Request $request)
  {
    // paramに配列を代入
    $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age
    ];
    // (:name, :mail, :age)にparamからデータをあて込んでいる
    DB::insert('insert into user (name, mail, age) values (:name, :mail, :age)', $param);
    return redirect('/creat');
  }
}
