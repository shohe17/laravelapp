<html>

<body>
  <!-- dataに入ってる一覧データを表示してください -->
  <h1>continue, brakeの使い方</h1>
  <!-- 繰り返し -->
  @for($i = 1; $i < 100; $i++)
  <!-- $iが奇数の場合次の処理を行う -->
  @if($i % 2 == 1)
    @continue
  <!-- 25未満の時処理を実行 -->
  @elseif($i <= 25)
    <li>No{{$i}}</li>
  @else
    @break
  @endif
  @endfor

</body>

</html>