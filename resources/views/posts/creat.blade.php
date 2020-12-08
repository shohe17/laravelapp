<html>

<body>
  @isset($msg)
  <p>こんにちは、{{ $msg }}さん</p>
  @else
  <p>何か書いてください</p>
  @endisset
  <form action="{{ route('creat.post') }}" method="post">
    <!-- ランダムな文字列を非表示で追加し、正しいフォームだけを受け付けるようにする -->
    @csrf
    <input type="text" name="msg">
    <input type="submit">
  </form>
</body>

</html>