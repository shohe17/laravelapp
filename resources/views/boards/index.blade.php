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
  <tr>
    <!-- hrefの中身は、=後の値でソートするように指定 -->
    <th><a href="/board?sort=title">title</a></th>
    <th><a href="/board?sort=message">message</a></th>
  </tr>
  @foreach ($items as $item)
    <tr>
      <td>{{ $item->title }}</td>
      <td>{{ $item->message }}</td>
    </tr>
  @endforeach
  </table>
  <!-- appendsは作るリンクにパラメータを追加するメソッド
  appendsの引数で指定された値をlinkの必須パラメータに指定 
  以下コードでリンクにパラメータを追加しているため、17,18で指定したhrefを使える -->
  {{ $items->appends(['sort' => $sort])->links() }}
  <!-- linksメソッドには前後の移動のためのリンクを生成する機能も入っている -->

@endsection

@section('footer')
copyright 2020 shosho
@endsection