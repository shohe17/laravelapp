<html>

<body>
  <!-- dataに入ってる一覧データを表示してください -->
  <h1>continue, brakeの使い方</h1>
  <ol>
    @php
    <!-- 変数初期化 -->
    $counter = 0;
    @endphp
    <!-- 繰り返し文 -->
    @while ($counter < count($data))
    <li>{{$data[$counter]}}</li>
    @php
    $counter++
    @endphp
    @endwhile
  </ol>

</body>

</html>