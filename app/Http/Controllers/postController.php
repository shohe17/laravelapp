<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class postController extends Controller
{
  public function index(Request $request)
  {
    // userテーブルのデータを全て取得
    $hasitems = User::has('boards')->get();
    $noitems = User::doesntHave('boards')->get();
    $param = ['hasItems' => $hasitems, 'noItems' => $noitems];
    return view('posts.index', $param);
  }

  // 指定したidのレコード取得
  public function show(Request $request)
  {
    // 変数に requestのinput *1を渡す
    $min = $request->input * 1;
    // 変数に min + 10を渡す、minが0の場合10、10の場合20
    $max = $min + 10;
    // greaterとlessを同時によば出して、x以上x以下の絞り込を実行
    // 今回の場合、minにリクエストされる数字以上、maxで指定してる値以下の数字
    $item = User::ageGreaterthan($min)
    ->ageLessThan($max)
    ->first();
    // 変数に、キーがinputのリクエスト情報とキーがitemの変数を代入
    $param = ['input' => $request->input, 'item' => $item];
    // 2引数でparamに入ってる値を返す
    return view('posts.show', $param);
  }

  public function create(Request $request)
  {
    $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age
    ];

    DB::table('users')->insert($param);

    return redirect('/');
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
    
    $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age
    ];

    DB::table('users')->insert($param);

    if ($validator->fails()) {
      return redirect('/')->withErrors($validator)->withInput();
    } else {
      return redirect('/');
    }
  }

  public function add(Request $request)
  {
    return view('posts.add');
  }

  public function edit(Request $request)
  {
    // リクエストされたidの一つ目をitemに代入する
    $item = DB::table('users')
    ->where('id', $request->id)->first();
    // posts.editファイルに移動するとき初期値が0の$itemを渡す
    return view('posts.edit', [
      'form' => $item
      ]);
  }
  
  public function update(Request $request)
  {
     // paramに配列を代入
     $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age
    ];
    // 更新したい値（:name:mail:age）にすでに値が入っているparamを入れる
      DB::table('users')
      ->where('id', $request->id)
      ->update($param);

    return redirect('/');  
  }

  // リクエストidを指定したレコードのidと紐づける
  public function delete(Request $request)
  {
    // 受け取ったidを指定したidの場所に入れる
    $item = DB::table('users')
    ->where('id', $request->id)
    ->first();

    return view('posts.delete', [
      'form' => $item
    ]);
  }

  public function remove(Request $request)
  {
    // 削除処理
    DB::table('users')
    ->where('id', $request->id)
    ->delete();
    return redirect('/');
  }
  
  // posts/sessionにアクセスした時の処理
  public function ses_get(Request $request)
  {
    // セッションしてからmsgをgetする
    $sesdata = $request->session()->get('msg');
    // 取り出した値をsession_dataにわたす
    return view('posts/index', ['session_data' => $sesdata]);
  }

  // posts/sessionにpostした時の処理
  public function ses_put(Request $request)
  {
    // リクエストされた入力値をmsgに入れる
    $msg = $request->input;
    // せっしょんした時に、ドルmsgが'msg'という名前でセッションに保管される
    $request->session()->put('msg', $msg);
    return redirect('/');
  }
}
