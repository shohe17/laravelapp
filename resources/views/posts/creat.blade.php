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
  <form action="/creat" method="post">
  <table>
    @csrf
    <tr><th>name: </th><td><input type="text" name="name"></td></tr>
    <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
    <tr><th>age: </th><td><input type="text" name="age"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
  </form>

@endsection

@section('footer')
copyright 2020 shosho
@endsection