<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_GET['unsign']) && isset($_GET['unsignData'])){// Удаление записи и вывод всех оставшихся записей
    $id = $_GET['unsign']; 
    $object = json_decode($_GET['unsignData'], true); 
    
    $deleteSign = $mysqli->query("DELETE from sign where id = $id;");

    $signs = $mysqli->query("SELECT id, name, phone, date, time FROM sign where name like '%{$object['name']}%' and phone like '%{$object['tel']}%';");
    $signs = $signs->fetch_all(MYSQLI_ASSOC);

    print_r(json_encode($signs));
  } else if(isset($_GET['allSigns'])){ // Вывод всех записей
    $object = json_decode($_GET['allSigns'], true); 
    
    $mysqli = new mysqli("localhost", "root", "", "mona");
    $signs = $mysqli->query("SELECT id, name, phone, date, time FROM sign where name like '%{$object['name']}%' and phone like '%{$object['tel']}%';");
    $signs = $signs->fetch_all(MYSQLI_ASSOC);
  
    print_r(json_encode($signs));
  
  } else {
    echo json_encode('Ошибка!!!');
  }

?>