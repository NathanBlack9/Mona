<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_GET['unsign']) && isset($_GET['unsignData'])){// Удаление записи и вывод всех оставшихся записей
    
    $object = json_decode($_GET['unsignData'], true); 
    $id = $mysqli->real_escape_string($_GET['unsign']); 
    $name = $mysqli->real_escape_string($object['name']);
    $phone = $mysqli->real_escape_string($object['tel']);
    
    $deleteSign = $mysqli->query("delete from sign where id = $id;");

    $signs = $mysqli->query("select id, name, phone, date, time FROM sign where name like '%$name%' and phone like '%$phone%';");
    $signs = $signs->fetch_all(MYSQLI_ASSOC);

    print_r(json_encode($signs));
  } else if(isset($_GET['allSigns'])){ // Вывод всех записей
    $object = json_decode($_GET['allSigns'], true); 
    $name = $mysqli->real_escape_string($object['name']);
    $phone = $mysqli->real_escape_string($object['tel']);
    
    $signs = $mysqli->query("select id, name, phone, date, time FROM sign where name like '%$name%' and phone like '%$phone%';");
    $signs = $signs->fetch_all(MYSQLI_ASSOC);
  
    print_r(json_encode($signs));
  
  } else {
    echo json_encode('Ошибка!!!');
  }

?>