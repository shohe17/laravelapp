<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title', 'add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
<form action="/creat/add" method="post">
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
copyright 2020 shosho.
@endsection