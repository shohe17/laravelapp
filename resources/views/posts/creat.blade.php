<html>
<head>
<!-- セクションの内容を嵌め込んで表示するためのもの -->
<title>@yield('title')</title>
</head>
<body>
  <h1>デザインはあと、@section、@yieldの使い方</h1>
  <!-- セクションの内容を嵌め込んで表示するためのもの -->
  <h2>@yield('title')</h2>
  <!-- ページに表示されるコンテンツの区画を定義 -->
  @section('menubar')
  <h3 class="menutitle">※メニュー</h3>
  <ul>
    <!-- メインのレイアウトでsectionを用意する場合は、endsectionではなくshowを使う -->
    <li>@show</li>
  </ul>
  <div class="content">
  <!-- 継承先のレイアウトでsection('content')とすれば@yieldで表示できる -->
  @yield('content')
  </div>
  <div class="footer">
  <!-- 上と同じ -->
  @yield('footer')
  </div>
</body>

</html>