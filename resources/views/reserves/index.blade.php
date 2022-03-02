<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation_system</title>
</head>
<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="#">予約システム</a>
      <a href="/logout">ログアウト</a>
    </nav>
  </header>
  <form>
    <label>予約方法を選択してください。</label>
    <a href="{{ route('reserves.reserve')}}">来社予約</a>
    <a href="{{ route('reserves.remote')}}">リモート予約
  </form>
</body>
</html>
