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
</head>
<body>

  <?php
  if (strlen($_POST['genre']) > 0) {$genre = $_POST['genre'];}
  if (strlen($_POST['price']) > 0) {$price = $_POST['price'];}
  if (strlen($_POST['address']) > 0) {$address = $_POST['address'];}
  if (strlen($_POST['date']) > 0) {$date = $_POST['date'];}
  if (strlen($_POST['time']) > 0) {$time = $_POST['time'];}
  if (strlen($_POST['people']) > 0) {$people = $_POST['people'];}
  if (strlen($_POST['course']) > 0) {$course = $_POST['course'];}

  $posts = show_research($genre, $price, $address, $people, $date, $time);
  if (count($posts)) {
    echo '<table border="1" cellspacing="0" cellpadding="5" width="500">';

    foreach ($posts as $key => $list){
    echo '<tr valign="top">';
    #echo '<td>'. $list['sid'] .'</td>';
    echo '<td>'."店舗名".$list['sname'] .'</td>';
    echo '<td>'."ジャンル".$list['genre'] .'</td>';
    echo '<td>'."値段".$list['price'] .'</td>';
    echo '<td>'."場所".$list['address'] .'</td>';
    echo '<td>'. "日にち".$list['date'] .'</td>';
    echo '<td>'. "時間".$list['time'] .'</td>';
    echo '<td>'."人数制限".$list['people'] .'</td>';
    echo '<td>'. "コース".$list['course'] .'</td>';
    echo '<td>'."説明". $list['remarks'] .'</td>';
    echo '</tr>';
    echo '</table>';
    echo '<br>';
    echo '<br>';
    echo '<form method="post" action="resv.php">';
    echo '<input type="submit" name="resv" value="予約！">';
    echo '<input type="hidden" name="cname" value="'. $_SESSION['cname'] .'">';
    echo '<input type="hidden" name="cemail" value="'. $_SESSION['cemail'] .'">';
    echo '<input type="hidden" name="ccall" value="'. $_SESSION['ccall'] .'">';
    echo '<input type="hidden" name="sid" value="'. $list['sid'] .'">';
    echo '</form>';
  }
  } else {
    echo '<p><b>データがありません！</b></p>';
  }
  ?>
  <p><a href="main_customer.php">探し直す</a>。</p>

</body>
</html>
