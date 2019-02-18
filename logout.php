<meta charset="UTF-8">
<?php
session_start();
$_SESSION = array();
if ( isset($_COOKIE[session_name()]) ) {
    setcookie(session_name(), '', time()-42000, '/');
}

session_destroy();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Logout</title>
  <link rel="stylesheet" type="text/css" href="./css/logout.css">
</head>
<body>
  <div class="log1">
  <p>ログアウトしました。</p><br />
  <a href="login.html">ログイン画面へ</a>
</div>
</body>
</html>
