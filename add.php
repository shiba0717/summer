<?php
session_start();
include_once('db.php');
include_once('functions_post.php');

$sid = $_SESSION['sid'];
$sname = $_SESSION['sname'];
if (strlen($_POST['sgenre']) > 0) {$sgenre = $_POST['sgenre'];}
if (strlen($_POST['price']) > 0) {$price = $_POST['price'];}
if (strlen($_POST['splace']) > 0) {$splace = $_POST['splace'];}
if (strlen($_POST['time']) > 0) {$time = $_POST['time'];}
if (strlen($_POST['date']) > 0) {$date = $_POST['date'];}
if (strlen($_POST['people']) > 0) {$people = $_POST['people'];}
if (strlen($_POST['course']) > 0) {$course = $_POST['course'];}
$remarks = substr($_POST['remarks'],0,140);

if ($sgenre=='' || $price=='' || $splace=='' || $time=='' || $date=='' || $people=='' || $course=='') {
  echo '備考欄以外は必須入力です。<br />';
  echo '<input type="button" onclick="history.back()" value="戻る">';
}else{
 add_post($sid, $sname, $sgenre, $price, $splace, $date, $time, $people, $course, $remarks);
 $_SESSION['message'] = "投稿されました！";
 header('Location:main.php');
}
?>
