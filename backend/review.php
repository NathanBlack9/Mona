<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_POST['newReviewData'])) {
  
    $object = json_decode($_POST['newReviewData'], true); 
  
    $mysqli = new mysqli("localhost", "root", "", "mona");
  
    $marterId = $mysqli->query("SELECT id FROM masters where last_name = '{$object['master']}';");
    $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
    $masterId = intval($marterId['id']);
  
    $serviceId = $mysqli->query("INSERT into reviews (master_id, name, rating, text) values ({$masterId}, '{$object['name']}', {$object['rating']}, '{$object['text']}');");
      
    print_r('Добавлен новый отзыв');
  } else {
    echo json_encode('Ошибка!!!');
  }

?>