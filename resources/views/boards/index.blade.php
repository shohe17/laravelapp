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
  <tr><th>Data</th></tr>
    @foreach ($items as $item)
    <tr>
      <!-- usermodelで定義した関数getdataを使ってitemを順に表示 -->
      <td>{{ $item->getData() }}</td>
    </tr>
  @endforeach
  </table>  

@endsection

@section('footer')
copyright 2020 shosho
@endsection