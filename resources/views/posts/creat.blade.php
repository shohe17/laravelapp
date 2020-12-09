<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title.Post')
@endsection

@section('content')
  <p>ここの文字がpractice.bladeに反映されます</p>
  <p>必要な記述はここ</p>

  <!-- componentsフォルダのmessageファイル読み込み -->
  @component('components.message')
    <!-- msgtitle -->
    <!-- messagebladeの波カッコで指定された変数の読み込み -->
    @slot('msg_title')
    CAUTION!
    @endslot
    <!-- messageファイルの波カッコで指定されたmsg_contentを読み込み -->
    @slot('msg_content')
    これはメッセージの表示です
    @endslot
  @endcomponent
@endsection

@section('footer')
copyright 2020 shosho
@endsection