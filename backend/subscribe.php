<?php

  $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
  // $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_POST['subscribeEmail'])){
    $object = json_decode($_POST['subscribeEmail'], true); 
  
    $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
    // $mysqli = new mysqli("localhost", "root", "", "mona");

    $email = $mysqli->real_escape_string($object['email']);
  
    $queryInsert = $mysqli->query("insert INTO alert(email) VALUES ('$email');");
  
    if (!$queryInsert) {
      echo false;
    } else {
      echo true;
    }
    
  } else {
    echo json_encode('Ошибка!!!');
  }

?>