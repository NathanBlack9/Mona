<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_GET['unsign']) && isset($_GET['unsignData'])){// Удаление записи и вывод всех оставшихся записей
    
    $object = json_decode($_GET['unsignData'], true); 
    $id = $mysqli->real_escape_string($_GET['unsign']); 
    $connectedID = $mysqli->real_escape_string($_GET['unsign'] - 1);
    $name = $mysqli->real_escape_string($object['name']);
    $phone = $mysqli->real_escape_string($object['tel']);
    
    $deleteSign = $mysqli->query("delete from sign where id = $id;"); // Удаляем запись

    $typeOfDeletingService = $mysqli->query("select category_id as id FROM `services` WHERE id = (select service_id from sign where id = $connectedID);");
    $typeOfDeletingService = $typeOfDeletingService->fetch_array(MYSQLI_NUM);

    if($typeOfDeletingService[0] == 2 || $typeOfDeletingService[0] == 4) {
      $deleteSign = $mysqli->query("delete from sign where id = $connectedID;"); // Удаляем связанную запись для наращиавния/педикюра
    }

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