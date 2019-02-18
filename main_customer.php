<html>
<head>
<title>
 Main Page
</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="./css/main_customer.css">
</head>
<body>
  <h1>My Page</h1>
<div class="select-box01">
  <h2>ドタキャンされた店舗を探して見よう。安く予約できるかも！</h2>
<form method='post' action='research_result.php'>
<p>ジャンル</p>
  <select name="genre">
   <option value="和食">和食</option>
   <option value="アジア・エスニック">アジア・エスニック</option>
   <option value="韓国">韓国</option>
   <option value="中華">中華</option>
   <option value="イタリアン">イタリアン</option>
   <option value="フレンチ">フレンチ</option>
   <option value="焼肉">焼肉</option>
   <option value="居酒屋">居酒屋</option>
   <option value="その他">その他</option>
 </select>
<br>
<p>価格</p>
  <select name="price">
   <option value="～１０００円">～１０００円</option>
   <option value="１０００～２０００円">１０００～２０００円</option>
   <option value="２０００～３０００円">２０００～３０００円</option>
   <option value="３０００～４０００円">３０００～４０００円</option>
   <option value="４０００～５０００円">４０００～５０００円</option>
   <option value="５０００～６０００円">５０００～６０００円</option>
   <option value="６０００円～">６０００円～</option>
  </select>
<br>
 <p>場所</p>
 <select name="address">
  <optgroup label="北海道">
   <option value="北海道">北海道</option>
  <optgroup label="東北">
    <option value="青森">青森</option>
    <option value="岩手">岩手</option>
    <option value="宮城">宮城</option>
    <option value="秋田">秋田</option>
    <option value="山形">山形</option>
    <option value="福島">福島</option>
  <optgroup label="関東">
    <option value="茨城">茨城</option>
    <option value="栃木">栃木</option>
    <option value="群馬">群馬</option>
    <option value="埼玉">埼玉</option>
    <option value="千葉">千葉</option>
    <option value="東京">東京</option>
    <option value="神奈川">神奈川</option>
  <optgroup label="中部">
    <option value="新潟">新潟</option>
    <option value="富山">富山</option>
    <option value="石川">石川</option>
   <option value="福井">福井</option>
    <option value="山梨">山梨</option>
    <option value="長野">長野</option>
    <option value="岐阜">岐阜</option>
    <option value="静岡">静岡</option>
    <option value="愛知">愛知</option>
  <optgroup label="近畿">
    <option value="三重">三重</option>
    <option value="滋賀">滋賀</option>
    <option value="奈良">奈良</option>
    <option value="和歌山">和歌山</option>
    <option value="京都">京都</option>
    <option value="大阪">大阪</option>
    <option value="兵庫">兵庫</option>
  <optgroup label="中国">
    <option value="鳥取">鳥取</option>
    <option value="島根">島根</option>
    <option value="岡山">岡山</option>
    <option value="広島">広島</option>
    <option value="山口">山口</option>
  <optgroup label="四国">
    <option value="香川">香川</option>
    <option value="愛媛">愛媛</option>
    <option value="徳島">徳島</option>
    <option value="高知">高知</option>
 <optgroup label="九州">
    <option value="福岡">福岡</option>
    <option value="佐賀">佐賀</option>
    <option value="長崎">長崎</option>
    <option value="熊本">熊本</option>
    <option value="大分">大分</option>
    <option value="宮崎">宮崎</option>
    <option value="鹿児島">鹿児島</option>
 <optgroup label="沖縄">
    <option value="沖縄">沖縄</option>
 </select>
<br>
 <p>日付指定</p>
  <input type="date" name="date">
<br>
 <p>時間指定</p>
  <input type="text" name="time" style="ime-mode: disabled;">
  <br>
  <p>人数(上限):</p><input type="number" name="people" size="40">人まで<br>
<br><br><br>
<div class="select-box01">
  <input type="submit" value="検索">
</div>
</form>
</div>
<a href="logout.php">ログアウト</a>
</body>
</html>
