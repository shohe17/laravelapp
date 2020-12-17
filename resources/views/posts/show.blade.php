<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title', 'show')

@section('menubar')
  @parent
  詳細ページ
@endsection

@section('content')
  <table>
    @csrf
    <tr><th>id: </th><td>{{ $item->id }}</td></tr>
    <tr><th>name: </th><td>{{ $item->name }}</td></tr>
    <tr><th>mail: </th><td>{{ $item->mail }}</td></tr>
    <tr><th>age: </th><td>{{ $item->age }}</td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
@endsection

@section('footer')
copyright 2020 shosho.
@endsection