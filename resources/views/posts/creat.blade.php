<html>

<body>
  <!-- dataに入ってる一覧データを表示してください -->
  <h1>continue, brakeの使い方</h1>
  <ol>
    @php
    $counter = 0;
    @endphp
    @while ($counter < count($data))
    <li>{{$data[$counter]}}</li>
    @php
    $counter++
    @endphp
    @endwhile
  </ol>

</body>

</html>