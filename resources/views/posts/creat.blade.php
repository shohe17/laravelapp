<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title.Post')
@endsection

@section('content')
  <p>コンテンツの本文</p>
  <p>これは<middleware>google.com</middleware>へのリンクです</p>
  <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>
@endsection

@section('footer')
copyright 2020 shosho
@endsection