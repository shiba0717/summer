<meta charset="UTF-8">
<?php
session_start();
include_once('db.php');
include_once('function_research.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="./css/shop_detail.css">
</head>
<body>

  <?php
  $pid = $_GET['pid'];
  $sname = $_GET['sname'];
  $sql="select sid,genre,price,address,date,time,people,course,remarks from posts where pid='". $pid . "';";
  $res = pg_query($sql) or die('Query failed: ' . pg_last_error());
  $sid = pg_fetch_result($res, 0, 0);
  $genre = pg_fetch_result($res, 0, 1);
  $price = pg_fetch_result($res, 0, 2);
  $address = pg_fetch_result($res, 0, 3);
  $date= pg_fetch_result($res, 0, 4);
  $time= pg_fetch_result($res, 0, 5);
  $people = pg_fetch_result($res, 0, 6);
  $course = pg_fetch_result($res, 0, 7);
  $remarks = pg_fetch_result($res, 0, 8);


    echo '<h1>'.$sname.'</h1>';
    echo '<br><br>';
    echo '<h2>';
    echo "日時：";
    echo $date;
    echo '<br><br>';
    echo "時間：";
    echo $time;
    echo "時からスタート：";
    echo '<br><br>';
    echo "人数：";
    echo $people;
    echo "人まで";
    echo '<br><br>';
    echo "コース：";
    echo $course;
    echo '<br><br>';
    echo "備考：";
    echo $remarks;
    echo '</h2>';
    echo '<form method="post" action="resv.php">';
    echo '<input type="submit" name="resv" value="予約！">';
    echo '<input type="hidden" name="cname" value="'. $_SESSION['cname'] .'">';
    echo '<input type="hidden" name="cemail" value="'. $_SESSION['cemail'] .'">';
    echo '<input type="hidden" name="ccall" value="'. $_SESSION['ccall'] .'">';
    echo '<input type="hidden" name="sid" value="'. $sid .'">';
    echo '</form>';
  ?>
  <p><a href="research_result.php">戻る</a></p>

</body>
</html>
