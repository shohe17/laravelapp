<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title.Post')
@endsection

@section('content')

  <!-- 引数の中身の>より左が0より大きい場合エラーを表示、countでerrorsを計算する -->
  @if(count($errors) > 0)
  <div>
    <p>入力に問題があるので再入力してください</p>
  </div>
  @endif
  <form action="/posts/show" method="post">
  @csrf
  <input type="text" name="input" value="{{ $input }}">
  <input type="submit" value="find">
  </form>
  @if (isset($item))
  <table>
  <tr><th>Data</th></tr>
  <tr>
    <!-- usermodelで定義した関数getdataを使ってitemを順に常時する -->
    <td>{{ $item->getData() }}</td>
  </tr>
  </table>
  @endif
@endsection

@section('footer')
copyright 2020 shosho
@endsection