<?php
header('Content-Type: text/html; charset=UTF-8');
function show_research($genre, $price, $address, $people, $date, $time) {
  if (!empty($genre) && !empty($price) && !empty($address) && !empty($people) && !empty($date) && !empty($time)) {
    $posts = array();
    $sql = "select * from posts where genre = '". $genre ."' and price = '". $price ."' and address = '". $address ."'
    and people = '". $people ."' and date = '". $date ."' and time = '". $time ."';";
    $res = pg_query($sql) or die('Query failed: ' . pg_last_error());

    // while ($data = pg_fetch_object($res)) {
    //   $posts[] = array('pid' => $data->pid ,'sid' => $data->sid, 'sname' => $data->sname, 'genre' => $data->genre, 'price' => $data->price, 'address' => $data->address, 'date' => $data->date, 'time' => $data->time,
    //   'people' => $data->people, 'course' => $data->course, 'remarks' => $data->remarks,);
    // }
    $posts[] = pg_fetch_array($res, 0, PGSQL_ASSOC);
  }
  return $posts;
}
