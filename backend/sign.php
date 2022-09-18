<?php

  $mysqli = new mysqli("localhost", "root", "", "mona");

  if(isset($_GET['databaseData']) && isset($_GET['serviceName']) ) {
  
    $object = json_decode($_GET['databaseData'], true); 
    $serviceName = $mysqli->real_escape_string($_GET['serviceName']);

    $services_info = $mysqli->query("select id, category_id, time FROM services WHERE services_name like '%$serviceName%'");
    $services_info = $services_info->fetch_array(MYSQLI_ASSOC);
  
    $mysqli = new mysqli("localhost", "root", "", "mona");

    $serviceId = $mysqli->real_escape_string(intval($services_info['id']));
    $categoryId = $mysqli->real_escape_string(intval($services_info['category_id']));
    $master = $mysqli->real_escape_string($object['masters']);
    $date = $mysqli->real_escape_string($object['date']);
    $name = $mysqli->real_escape_string($object['text-name']);
    $phone = $mysqli->real_escape_string($object['tel']);
    $email = $mysqli->real_escape_string($object['email']);
    // $service_time = $mysqli->real_escape_string(intval($services_info['time']));
    
    $marterId = $mysqli->query("select id FROM masters where last_name = '$master';");
    $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
    $masterId = $mysqli->real_escape_string(intval($marterId['id']));
    
    $time = intval(mb_substr($object['time'], 0, 2)) + ( intval(mb_substr($object['time'], 3, 2)) / 60 );
    $time = $mysqli->real_escape_string($time);
    
    if ($categoryId == 2) { // Если это педикюр - то добавляем мастеру по наращиванию
      $queryI = $mysqli->query("insert INTO sign (service_id, master_id, date, time) VALUES ($serviceId, 2, '$date', '$time');");
    } else if ($categoryId == 4) { // Если это наращивание - то добавляем мастеру по педикюру
      $queryI = $mysqli->query("insert INTO sign (service_id, master_id, date, time) VALUES ($serviceId, 1, '$date', '$time');");
    }
  
    $queryI = $mysqli->query("insert INTO sign (service_id, master_id, date, time, name, phone, email) VALUES ($serviceId, $masterId, '$date', '$time', '$name', '$phone', '$email');");
  
    print_r('ГОТОВО!!!');

  } else {
    echo json_encode('Ошибка!!!');
  }

?>