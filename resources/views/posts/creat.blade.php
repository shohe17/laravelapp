<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title.Post')

<!-- 親レイアウトにmenubarというyieldがあればそこに嵌め込まれる -->
@section('menubar')
  @parent
@endsection

@section('content')
  <p>ここの文字がpractice.bladeに反映されます</p>
  <p>必要な記述がdケイル</p>
@endsection

@section('footer')
copyright 2020 shosho
@endsection