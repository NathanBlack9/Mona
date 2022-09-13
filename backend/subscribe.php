<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_POST['subscribeEmail'])){
    $object = json_decode($_POST['subscribeEmail'], true); 
  
    $mysqli = new mysqli("localhost", "root", "", "mona");
  
    $queryInsert = $mysqli->query("INSERT INTO alert(email) VALUES ('{$object['email']}');");
  
    if (!$queryInsert) {
      echo false;
    } else {
      echo true;
    }
    
  } else {
    echo json_encode('Ошибка!!!');
  }

?>