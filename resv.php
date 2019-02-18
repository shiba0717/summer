<meta charset="UTF-8">
<?php
session_start();
include_once('db.php');
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>予約</title>
    <link rel="stylesheet" type="text/css" href="./css/resv.css">
  </head>
  <div class="resv1">
  <body>
    <?php
if(!empty($_POST)){
    if (strlen($_POST['cname'])>0){$cname=$_POST['cname'];}
    if (strlen($_POST['cemail'])>0){$cemail=$_POST['cemail'];}
    if (strlen($_POST['ccall'])>0){$ccall=$_POST['ccall'];}
    if (strlen($_POST['sid'])>0){$sid=$_POST['sid'];}
    $sql="select * from shop where sid='". $sid . "';";
    $res = pg_query($sql) or die('Query failed: ' . pg_last_error());
    $semail = pg_fetch_result($res, 0, 2);

    $mailfr="1gk5275t@komazawa-u.ac.jp";
    $mailsb="予約のお知らせ";
    $mailms="下記のお客様から予約を承りました。\n\n" .
      "   お客様名前:" . $cname . "\n" .
      "   お客様email:" . $cemail . "\n" .
      "   お客様電話番号:" . $ccall . "\n\n";
    if (mb_send_mail($semail, $mailsb,
      $mailms, "From: " . $mailfr)) {
      echo "<p>予約を承りました。お店からのご連絡をお待ちください。</p>";
    } else {
      echo "<p>メールの送信に失敗しました。</p>";
    }
  }else{
    echo "無効なアクセスです";
  }
      ?>


      <p><a href="main_customer.php">戻る</a>。</p>

</div>
  </body>
</html>
