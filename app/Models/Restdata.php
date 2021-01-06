<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
    // protectedはそのクラスと継承クラスからアクセスが可能
    // ここではテーブル名を指定している
    protected $table = 'restdata';
    // guardedで代入を許可しない値を指定
    // idは代入できない
    protected $guarded = array('id');
    
    // バリデーション設定
    public static $rules = array(
      'message' => 'required',
      'url' => 'required',
    );

    // テキストの出力
    public function getData()
    {
      // メソッドが実行された場所に戻る
      // メッセージとurlが
      return $this->id . ':' . $this->message
      . '(' . $this->url . ')';
    }
}
