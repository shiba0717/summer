<meta charset="UTF-8">
<?php
include_once('db.php');

if (isset($_COOKIE['cem'])) {
  $cem = htmlspecialchars($_COOKIE['cem']);
}

if (isset($_COOKIE['cpw'])) {
  $cpw = htmlspecialchars($_COOKIE['cpw']);
}

if (strlen($_POST['cem']) > 0) {
  $cem=$_POST['cem'];
}

if (strlen($_POST['cpw']) > 0) {
  $cpw=$_POST['cpw'];
}

$sql="select * from customer where cemail='". $cem . "' and cpassword='" . $cpw . "';";
$res = pg_query($sql) or die('Query failed: ' . pg_last_error());
$cid = pg_fetch_result($res, 0, 0);
$cname = pg_fetch_result($res, 0, 1);
$cemail = pg_fetch_result($res, 0, 2);
$ccall = pg_fetch_result($res, 0, 4);


if(pg_num_rows($res) == 0) {
  echo 'メールアドレスかパスワードが間違っています。<br />';
  echo '<a href="login.html">戻る</a>';
} else {
  setcookie("cem", $cem, time()+31536000, "/~daikishibamura07/Project/", "gms.gdl.jp");
  setcookie("cpw", $cpw, time()+31536000, "/~daikishibamura07/Project/", "gms.gdl.jp");
  session_start();
  $_SESSION['login'] = 1;
  $_SESSION['cid'] = $cid;
  $_SESSION['cname'] = $cname;
  $_SESSION['cemail'] = $cemail;
  $_SESSION['ccall'] = $ccall;
  header('Location: http://gms.gdl.jp/~daikishibamura07/cgi-bin/main_customer.php');
}
?>
