<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class CreatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // 戻り値でtrueがくれば許可、こなければ不許可で例外が発生し処理が止まる
    public function authorize()
    {
      // パスを確認している$this->pathで
      // パスがcreatの場合はtrue、そうでない場合はfalse。creat以外からは利用できないようにする
      if ($this->path() == 'creat')  
      {
        return true;
      } else {
        return false;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // 検証ルールの指定
    public function rules()
    {

        return [
          'name' => 'required',
          'mail' => 'email',
          'age' => 'numeric|between:0,150',
        ];
    }
    // validateメッセージの追加
    public function messages()
    {
      return [
        'name.required' => '名前は必須です',
        'mail.email' => 'メール形式で入力して',
        'age.numeric' => '年齢は整数で',
        'age.between' => '0〜150で入力して'
      ];
    }
}
