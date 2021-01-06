<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title, Board.index')
@endsection

@section('menuber')
  @parent
  ボードページ
@endsection

@section('content')
<table>
  <h1>ページネーション練習</h1>
  <tr><th>title</th><th>message</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{ $item->title }}</td>
      <td>{{ $item->message }}</td>
    </tr>
  @endforeach
  </table>
  <!-- linksメソッドには前後の移動のためのリンクを生成する機能も入っている -->
  {{ $items->links() }}

@endsection

@section('footer')
copyright 2020 shosho
@endsection