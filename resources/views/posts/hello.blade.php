<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<style>
  .pagenation { font-size: 10px; }
  .pagenation li { display: inline-block; }
</style>
<!-- Postという値が表示される -->
@section('title.hello')
@endsection
  @parnent
  インデックスページ
@section('content')
  <table>
  <h1>ページネーション練習</h1>
  <tr><th>name</th><th>mail</th><th>age</th></tr>
  @foreach ($items as $item)
    <tr>
      <th>aa</th>
    </tr>
  @endforeach
  </table>
  {{ $items->links() }}

  @endsection

@section('footer')
copyright 2020 shosho
@endsection