<meta charset="UTF-8">
<?php
session_start();
include_once('db.php');
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
   echo 'ログインされていません。<br />';
   echo '<a href="login.html">ログイン画面へ</a>';
   exit();
 }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>店舗メイン</title>
  <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
  <?php
  if (isset($_SESSION['message'])){
    echo '<p>'. $_SESSION['message'].'</p>';
    unset($_SESSION['message']);
  }
$sid=$_SESSION['sid'];
  $sql="select * from shop where sid='". $sid . "';";
  $res = pg_query($sql) or die('Query failed: ' . pg_last_error());
  $splace = pg_fetch_result($res, 0, 4);
  $sgenre = pg_fetch_result($res, 0, 5);
  ?>
  <form method='post' action='add.php'>
    <h2><span>助けを呼ぼう</span></h2>
    <h4>項目を埋めてドタキャンされたことをシェアしよう！誰かが再予約してくれるかも？</h4>

    <br><br>
    <p><span>ジャンル:</span> <?php echo $sgenre;?></p>
    <p><span>場所:</span> <?php echo $splace;?></p>
    <p><span>価格:</span> <select name="price">
      <option value="～１０００円">～１０００円</option>
      <option value="１０００～２０００円">１０００～２０００円</option>
      <option value="２０００～３０００円">２０００～３０００円</option>
      <option value="３０００～４０００円">３０００～４０００円</option>
      <option value="４０００～５０００円">４０００～５０００円</option>
      <option value="５０００～６０００円">５０００～６０００円</option>
      <option value="６０００円～">６０００円～</option>
    </select></p>
    <p><span>日付指定:</span> <input type="date" name="date"></p>
    <p><span>時間指定:</span> <input type="text" name="time" style="ime-mode: disabled;"></p>
    <p><span>人数(上限):</span><input type="number" name="people" size="40">人まで</p>
    <p><span>コース:</span><input type="text" name="course" size="40"></p>
    <p><span>備考</span></p>
    <textarea name='remarks' rows='5' cols='40' wrap=VIRTUAL></textarea>
    <?php echo '<input type="hidden" name="splace" value="'. $splace .'">';
    echo '<input type="hidden" name="sgenre" value="'. $sgenre.'">';
    ?>
    <p><input type='submit' value='送信！'/></p>
  </form>
<a href="logout.php">ログアウト</a>
</body>
</html>
