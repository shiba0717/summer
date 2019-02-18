<meta charset="UTF-8">
<?php
include_once('db.php');

if (isset($_COOKIE['sem'])) {
  $sem = htmlspecialchars($_COOKIE['sem']);
}

if (isset($_COOKIE['spw'])) {
  $spw = htmlspecialchars($_COOKIE['spw']);
}

if (strlen($_POST['sem']) > 0) {
  $sem=$_POST['sem'];
}

if (strlen($_POST['spw']) > 0) {
  $spw=$_POST['spw'];
}

$sql="select * from shop where semail='". $sem . "' and spassword='" . $spw . "';";
$res = pg_query($sql) or die('Query failed: ' . pg_last_error());
$sid = pg_fetch_result($res, 0, 0);
$sname = pg_fetch_result($res, 0, 1);

if(pg_num_rows($res) == 0) {
  echo 'メールアドレスかパスワードが間違っています。<br />';
  echo '<a href="login.html">戻る</a>';
} else {
  setcookie("sem", $sem, time()+31536000, "/~daikishibamura07/Project/", "gms.gdl.jp");
  setcookie("spw", $spw, time()+31536000, "/~daikishibamura07/Project/", "gms.gdl.jp");
  session_start();
  $_SESSION['login'] = 1;
  $_SESSION['sid'] = $sid;
  $_SESSION['sname'] = $sname;
  header('Location: http://gms.gdl.jp/~daikishibamura07/cgi-bin/main.php');
}
?>
