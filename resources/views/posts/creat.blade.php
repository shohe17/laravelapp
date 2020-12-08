<html>

<body>
  <!-- dataに入ってる一覧データを表示してください -->
  <h1>繰り返し文</h1>
  @foreach($data as $name)
  <li>{{ $name }}</li>
  @endforeach
</body>

</html>