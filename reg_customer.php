<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="./css/reg.css">
  </head>
  <body>
    <?php

    if (strlen($_POST['cname'])>0){$cname=$_POST['cname'];}
    if (strlen($_POST['cname'])>0){$cemail=$_POST['cemail'];}
    if (strlen($_POST['ccall'])>0){$ccall=$_POST['ccall'];}

    if (strlen($cname)>0 && strlen($cemail)>0 && strlen($ccall)>0){
      $sql="select * from customer where cemail='". $cemail . "';";
      $dbconn = pg_connect("host=localhost dbname=daikishibamura07 user=daikishibamura07 password=vkghwmNV")
          or die('Could not connect: ' . pg_last_error());
      $result = pg_query($sql) or die('Query failed: ' . pg_last_error());
      if(pg_num_rows($result)==0){
        $cpw=substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
        $sql="insert into customer(cname,cemail,cpassword,ccall) values ('" .
          $cname . "','" . $cemail . "','" . $cpw . "',$ccall);";
        pg_query($sql) or die('Query failed: ' . pg_last_error());
        echo '<p>ユーザ登録を完了しました</p>';
        $mailfr="1gk6280d@komazawa-u.ac.jp";
        $mailsb="[phpua]ユーザ登録完了";
        $mailms="下記のとおりユーザ登録を完了しました。\n\n" .
          "   名前:" . $cname . "\n" .
          "   email:" . $cemail . "\n" .
          "   パスワード:" . $cpw . "\n\n" .
          "   電話番号:" . $ccall . "\n\n" .
          "http://gms.gdl.jp/~daikishibamura07/login.html\n\n";
        if (mb_send_mail($cemail, $mailsb,
          $mailms, "From: " . $mailfr)) {
          echo "<p>メールが送信されました。</p>";
        } else {
          echo "<p>メールの送信に失敗しました。</p>";
        }
        echo "<a href=\"./login.html\">戻る</a>";
      }
      else{
        while ($row = pg_fetch_row($result)) {
          $uno=$row[1]; $emo=$row[2]; $pwo=$row[3];
          $mailfr="1gk6280d@komazawa-u.ac.jp";
          $mailsb="[shop]ユーザ確認";
          $mailms="下記のとおりユーザが登録されていました。\n\n" .
            "   ユーザ名:" . $cname . "\n" .
            "   email:" . $cemail . "\n" .
            "   パスワード:" . $cpw . "\n\n" .
            "http://gms.gdl.jp/~daikishibamura07/cgi-bin/login.html\n\n";
          if (mb_send_mail($cemail, $mailsb,
            $mailms, "From: " . $mailfr)) {
            echo "<p>メールが送信されました。</p>";
          } else {
            echo "<p>メールの送信に失敗しました。</p>";
          }
        }
          echo "<a href=\"./login.html\">戻る</a>";
      }
    }
    else{echo 'error';}
      ?>




  </body>
</html>
