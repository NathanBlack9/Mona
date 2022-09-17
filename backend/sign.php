<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_GET['databaseData']) && isset($_GET['serviceName']) ) {
  
    $serviceName = $_GET['serviceName'];
  
    $object = json_decode($_GET['databaseData'], true); 
  
    $mysqli = new mysqli("localhost", "root", "", "mona");
  
    $services_info = $mysqli->query("select id, category_id, time FROM services WHERE services_name like '%{$serviceName}%'");
    $services_info = $services_info->fetch_array(MYSQLI_ASSOC);

    $serviceId = intval($services_info['id']);
    $categoryId = intval($services_info['category_id']);
    $service_time = intval($services_info['time']);
    
    $marterId = $mysqli->query("select id FROM masters where last_name = '{$object['masters']}';");
    $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
    $masterId = intval($marterId['id']);
    
    $time = intval(mb_substr($object['time'], 0, 2)) + ( intval(mb_substr($object['time'], 3, 2)) / 60 );
    
    if ($categoryId == 2) { // Если это педикюр - то добавляем мастеру по наращиванию
      $queryI = $mysqli->query("insert INTO sign (service_id, master_id, date, time) VALUES ({$serviceId}, 2, '{$object['date']}', '{$time}');");
    } else if ($categoryId == 4) { // Если это наращивание - то добавляем мастеру по педикюру
      $queryI = $mysqli->query("insert INTO sign (service_id, master_id, date, time) VALUES ({$serviceId}, 1, '{$object['date']}', '{$time}');");
    }
  
    $queryI = $mysqli->query("insert INTO sign (service_id, master_id, date, time, name, phone, email) VALUES ({$serviceId}, {$masterId}, '{$object['date']}', '{$time}', '{$object['text-name']}', '{$object['tel']}', '{$object['email']}');");
  
    print_r('ГОТОВО!!!');

  } else {
    echo json_encode('Ошибка!!!');
  }

?>