<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_GET['databaseData']) && isset($_GET['serviceName']) ) {
  
    $serviceName = $_GET['serviceName'];
  
    $object = json_decode($_GET['databaseData'], true); 
  
    $mysqli = new mysqli("localhost", "root", "", "mona");
  
    $serviceId = $mysqli->query("SELECT id FROM services WHERE services_name like '%{$serviceName}%'");
    $serviceId = $serviceId->fetch_array(MYSQLI_ASSOC);
    $serviceId = intval($serviceId['id']);
    
    $marterId = $mysqli->query("SELECT id FROM masters where last_name = '{$object['masters']}';");
    $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
    $masterId = intval($marterId['id']);
    
    $time = intval(mb_substr($object['time'], 0, 2)) + ( intval(mb_substr($object['time'], 3, 2)) / 60 );
  
    $queryI = $mysqli->query("INSERT INTO sign (service_id, master_id, date, time, name, phone, email) VALUES ({$serviceId}, {$masterId}, '{$object['date']}', '{$time}', '{$object['text-name']}', '{$object['tel']}', '{$object['email']}');");
  
  
    print_r('Готово');
  
  } else {
    echo json_encode('Ошибка!!!');
  }

?>