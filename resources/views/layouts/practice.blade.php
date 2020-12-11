<html>
<head>
<!-- セクションの内容を嵌め込んで表示するためのもの -->
<title>@yield('title')</title>
</head>
<body>
  <h1>デザインはあと、section、yieldの使い方</h1>
  <!-- セクションの内容を嵌め込んで表示するためのもの -->
  <h2>@yield('title')</h2>
  <!-- ページに表示されるコンテンツの区画を定義 -->
  @section('menubar')
  
  <div class="content">
  <!-- 継承先のレイアウトでsection'content'とすればyieldで表示できる -->
  @yield('content')
  </div>
  <div class="footer">
  <!-- 上と同じ -->
  @yield('footer')
  </div>
</body>

</html>