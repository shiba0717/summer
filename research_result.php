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
  <title>検索結果</title>
  <link rel="stylesheet" type="text/css" href="./css/research_result.css">
</head>
<body>
  <div style="text-align : center">
<h1>検索結果</h1>
</div>
<div class="kekka1">
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
      foreach ($posts as $list){
        echo '<a href="shop_detail.php?sname='.$list['sname'].'&pid='.$list['pid'].'">'
        .$list['date'].'  '.$list['time'].'  '.$list['sname'].'  '.$list['genre'].
        '</a>';
        echo '<br><br>';
      }
    }else{
      echo '<p>データがありません！</p>';
    }
  ?>
  <div class="kekka2">
  <p><a href="main_customer.php">探し直す</a>。</p>
</div>
</div>
</body>
</html>
