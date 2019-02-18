<meta charset="utf-8">
<?php
function add_post($sid, $sname, $genre, $price, $address, $date, $time, $people, $course, $remarks) {
 $sql = "insert into posts (sid, sname, genre, price, address, date, time, people, course, remarks) values ($sid, '". pg_escape_string($sname) ."', '". pg_escape_string($genre) ."', '". pg_escape_string($price) ."', '". pg_escape_string($address) ."',  '". pg_escape_string($date) ."', '". pg_escape_string($time) ."', $people,
 '". pg_escape_string($course) ."', '". pg_escape_string($remarks). "');";
 $res = pg_query($sql) or die('Query failed: ' . pg_last_error());
}
?>
