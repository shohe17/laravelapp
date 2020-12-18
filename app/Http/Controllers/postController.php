<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
  public function index(Request $request)
  {
    // userテーブルのデータを全て取得
    $items = DB::table('user')->get();
    
    return view('posts.index', [
      // 取得した情報を含めてposts.indexに値を
      'items' => $items
    ]);
  }

  // 指定したidのレコード取得
  public function show(Request $request)
  {
    // idをリクエストされたidと定義
    $name = $request->name;
    // userテーブルからnameとmailのどちらかの中から部分一致する値を表示したい
    $items = DB::table('user')
    // nameカラムから、リクエストされたnameの部分一致する値のレコードを選択
    ->where('name', 'like', '%' . $name . '%')
    // mailカラムから、リクエストされたnameの部分一致する値のレコードを選択
    ->orwhere('mail', 'like', '%' . $name . '%')
    // 全てのデータ読み込み
    ->get();
    return view('posts.show', [
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

  public function edit(Request $request)
  {
    // リクエストされたidを受け取る
    $param = ['id' => $request->id];
    // userテーブルのidに受け取ったparamのidを入れる
    $item = DB::select('select * from user where id = :id', $param);
    // posts.editファイルに移動するとき初期値が0の$itemを渡す
    return view('posts.edit', [
      'form' => $item[0]
      ]);
  }
  
  public function update(Request $request)
  {
     // paramに配列を代入
     $param = [
      'id' => $request->id,
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age
    ];
    // 更新したい値（:name:mail:age）にすでに値が入っているparamを入れる
    DB::update('update user set name =:name, mail =:mail, age =:age where id =:id', $param);

    return redirect('/creat');  
  }

  // リクエストidを指定したレコードのidと紐づける
  public function delete(Request $request)
  {
    // リクエストされたidの受け取り
    $param = ['id' => $request->id];
    // 受け取ったidを指定したidの場所に入れる
    $item = DB::select('select * from user where id = :id', $param);

    return view('posts.delete', [
      'form' => $item[0]
    ]);
  }

  public function remove(Request $request)
  {
    // リクエストデータ(id)の受け取り
    $param = ['id' => $request->id];    
    // 削除処理
    DB::delete('delete from user where id = :id', $param);
    return redirect('/creat');
  }
}
