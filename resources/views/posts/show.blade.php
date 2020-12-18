<!-- layoutsフォルダのpracticeというフォルダを読み込み -->
@extends('layouts.practice')
<!-- Postという値が表示される -->
@section('title', 'show')

@section('menubar')
  @parent
  詳細ページ
@endsection

@section('content')
@if ($items != null)
  @foreach ($items as $item)
  <table width="400">
    @csrf
    <tr><th width="50">id: </th>
    <td width="50">{{ $item->id }}</td>
    <th width="50">name:</th>
    <td>{{$item->name}}</td></tr>
  </table>
  @endforeach
@endif  
@endsection

@section('footer')
copyright 2020 shosho.
@endsection