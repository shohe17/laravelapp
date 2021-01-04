<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title', 'Board.create')

@section('menubar')
  @parent
  投稿ページ
@endsection

@section('content')
<form action="/board/create" method="post">
  <table>
    @csrf
    <tr><th>user id: </th><td><input type="number" name="user_id"></td></tr>
    <tr><th>title: </th><td><input type="text" name="title"></td></tr>
    <tr><th>message: </th><td><input type="text" name="message"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
  </form>
@endsection

@section('footer')
copyright 2020 shosho.
@endsection