<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title', ' delete')

@section('menubar')
  @parent
  削除ページ
@endsection

@section('content')
<form action="/creat/delete" method="post">
  <table>
    @csrf
    <input type="hidden" name="id" value="{{ $form->id }}">
    <tr><th>name: </th><td>{{ $form->name }}</td></tr>
    <tr><th>mail: </th><td>{{ $form->mail }}</td></tr>
    <tr><th>age: </th><td>{{ $form->age }}</td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
  </form>
@endsection

@section('footer')
copyright 2020 shosho.
@endsection