<html>

<body>
  <p>{{ $msg }}</p>
  <form action="{{ route('creat.post') }}" method="post">
    <!-- ランダムな文字列を非表示で追加し、正しいフォームだけを受け付けるようにする -->
    @csrf
    <input type="text" name="msg">
    <input type="submit">
  </form>
</body>

</html>