<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registration</title>
  </head>
  <link rel="stylesheet" type="text/css" href="./css/reg.css">
  <body>
    <?php

    if (strlen($_POST['sname'])>0){$sname=$_POST['sname'];}
    if (strlen($_POST['semail'])>0){$semail=$_POST['semail'];}
    if (strlen($_POST['splace'])>0){$splace=$_POST['splace'];}
    if (strlen($_POST['sgenre'])>0){$sgenre=$_POST['sgenre'];}

    if (strlen($sname)>0 && strlen($semail)>0 && strlen($splace)>0 && strlen($sgenre)>0){
      $sql="select * from shop where semail='". $semail . "';";
      $dbconn = pg_connect("host=localhost dbname=daikishibamura07 user=daikishibamura07 password=vkghwmNV")
          or die('Could not connect: ' . pg_last_error());
      $result = pg_query($sql) or die('Query failed: ' . pg_last_error());
      if(pg_num_rows($result)==0){
        $spw=substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
        $sql="insert into shop(sname,semail, spassword,splace,sgenre) values ('" .
          $sname . "','" . $semail . "','" . $spw . "','" . $splace . "','" . $sgenre . "');";
        pg_query($sql) or die('Query failed: ' . pg_last_error());
        echo '<p>ユーザ登録を完了しました</p>';
        $mailfr="1gk6280d@komazawa-u.ac.jp";
        $mailsb="ユーザ登録完了";
        $mailms="下記のとおりユーザ登録を完了しました。\n\n" .
          "   店舗名:" . $sname . "\n" .
          "   email:" . $semail . "\n" .
          "   パスワード:" . $spw . "\n\n" .
          "http://gms.gdl.jp/~daikishibamura07/cgi-bin/login.html\n\n";
        if (mb_send_mail($semail, $mailsb,
          $mailms, "From: " . $mailfr)) {
          echo "<p>メールが送信されました。</p>";
        } else {
          echo "<p>メールの送信に失敗しました。</p>";
        }
        echo "<a href=\"./login.html\">ログイン</a>";
      }
      else{
        while ($row = pg_fetch_row($result)) {
          $uno=$row[1]; $emo=$row[2]; $pwo=$row[3];
          $mailfr="1gk6280d@komazawa-u.ac.jp";
          $mailsb="登録失敗";
          $mailms="登録に失敗しました。もう一度お願いします。" .
            "同じアドレスが登録されている可能性があります。";
          if (mb_send_mail($emo, $mailsb,
            $mailms, "From: " . $mailfr)) {
            echo "<p>登録に失敗しました。もう一度お願いします。</p>";

          } else {
            echo "<p>メールの送信に失敗しました。</p>";
          }
        }
          echo "<a href=\"./reg_shop.php\">Try Again</a>";
      }
    }
    else{echo 'error';}
      ?>




  </body>
</html>
