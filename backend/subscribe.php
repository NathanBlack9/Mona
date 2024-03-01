<?php

$config = require "config.php";
if($config['type'] == 'dev') {
  $mysqli = new mysqli("localhost", "root", "", "mona");
} else {
  $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
}
  if(isset($_POST['subscribeEmail'])){
    $object = json_decode($_POST['subscribeEmail'], true);

    $config = require "config.php";
    if($config['type'] == 'dev') {
      $mysqli = new mysqli("localhost", "root", "", "mona");
    } else {
      $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
    }

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