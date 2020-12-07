<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
  public function creat(){
    $data = ['msg' => 'bladeの練習、下段には今日の日付が表示' ];
    return view('posts.creat', $data);
  }
}
