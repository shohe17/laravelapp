<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title.Post')
@endsection

@section('content')
  <p>コンテンツの本文</p>
  <p>これは<middleware>google.com</middleware>へのリンクです</p>
  <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>

  <p>{{ $msg }}</p>
  <!-- 引数の中身の>より左が0より大きい場合エラーを表示、countでerrorsを計算する -->
  @if(count($errors) > 0)
  <div>
    <p>入力に問題があるので再入力してください</p>
  </div>
  @endif
  <form action="/creat" method="post">
  <table>
    @csrf
    <!-- hasでエラーが発生してるか確かめる、項目名にエラーが発生しているか確認している -->
    @if($errors->has('name'))
    <!-- valueのold波かっこで、入力情報を保持することができる -->
    <!-- firstは、指定した項目の最初のエラーメッセージを取得 -->
    <tr><th>ERROR</th><td>{{ $errors->first('name') }}</td></tr>
    @endif
    <tr><th>name: </th><td><input type="text" name="name" value="{{ old('name') }}"></td></tr>
   
    @if($errors->has('mail'))
    <tr><th>ERROR</th><td>{{ $errors->first('mail') }}</td></tr>
    @endif
    <tr><th>mail: </th><td><input type="text" name="mail" value="{{ old('mail') }}"></td></tr>
    
    @if($errors->has('age'))
    <tr><th>ERROR</th><td>{{ $errors->first('age') }}</td></tr>
    @endif
    <tr><th>age: </th><td><input type="text" name="age" value="{{ old('age') }}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
  </form>

@endsection

@section('footer')
copyright 2020 shosho
@endsection