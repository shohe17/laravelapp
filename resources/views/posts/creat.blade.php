<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title.Post')
@endsection

@section('content')
  <p>コンテンツの本文</p>
  <p>Controller value<br>'message' = {{ $message }}</p>
  <p>ViewController value<br>'view_message' = {{ $view_message }}</p>
  
@endsection

@section('footer')
copyright 2020 shosho
@endsection