<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title', 'add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
<form action="/creat/edit" method="post">
  <table>
    @csrf
    <!-- idは変更しないので非表示hidden -->
    <input type="hidden" name="id" value="{{ $form->id }}">
    <!--  -->
    <tr><th>name: </th><td><input type="text" name="name" value="{{ $form->name }}"></td></tr>
    <tr><th>mail: </th><td><input type="text" name="mail" value="{{ $form->mail }}"></td></tr>
    <tr><th>age: </th><td><input type="text" name="age" value="{{ $form->age }}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
  </form>
@endsection

@section('footer')
copyright 2020 shosho.
@endsection