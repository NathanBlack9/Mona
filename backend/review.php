<?php

  $config = require "config.php";
  if($config['type'] == 'dev') {
    $mysqli = new mysqli("localhost", "root", "", "mona");
  } else {
    $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
  }

  if(isset($_POST['newReviewData'])) {
  
    $object = json_decode($_POST['newReviewData'], true); 

    $config = require "config.php";
    if($config['type'] == 'dev') {
      $mysqli = new mysqli("localhost", "root", "", "mona");
    } else {
      $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
    }

    $master = $mysqli->real_escape_string($object['master']);
    $name = $mysqli->real_escape_string($object['name']);
    $rating = $mysqli->real_escape_string($object['rating']);
    $reviewText = $mysqli->real_escape_string($object['text']);

    $marterId = $mysqli->query("select id FROM masters where last_name = '$master';");
    $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
    $masterId = $mysqli->real_escape_string(intval($marterId['id']));

    $serviceId = $mysqli->query("insert into reviews (master_id, name, rating, text) values ($masterId, '$name', $rating, '$reviewText');");
    
    $mysqli -> close();

    print_r('Добавлен новый отзыв');
  } else {
    echo json_encode('Ошибка!!!');
  }

?>