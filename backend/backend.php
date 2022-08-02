<?php 

/* Делает из массива чисел формат даты -> 13.5 = 13:30 */ 
function setTimeFormat($array ) {

  for ($i = 0; $i < count($array); $i++) {
      
    if (getDecimal($array[$i]) != 0) {
      $minutes = getDecimal($array[$i]) * 60;
    } else {
      $minutes = '00';
    }
  
    if (floor($array[$i]) < 10) {
      $array[$i] = '0' .floor($array[$i]). ':' .$minutes.'';
    } else {
      $array[$i] = ''.floor($array[$i]).':'.$minutes.'';
    }
  }

  return $array;
}
/* ------------------- */

function getDecimal($number) {
  return fmod($number, 1); // остаток от деления на 1
}

/* Получается свободное время мастер с ид $masterId, с временем выполнения услуги $serviceTime и в дату $date */
function getFreeSignTime( $date, $masterId, $serviceTime ) {
  // global $wpdb;

  $mysqli = new mysqli("localhost", "root", "", "mona");

  // $result = $mysqli->query("SELECT * from sign");
  $arrTimeStart = $mysqli->query("SELECT time FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");
  $arrTimeEnd = $mysqli->query("SELECT time_end FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");

  // $arrTimeStart = $wpdb->get_results("SELECT time FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");
  // $arrTimeEnd = $wpdb->get_results("SELECT time_end FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");

  $reservedTimesStart = [];
  $reservedTimesEnd = [];
  $timeLine = [];
  $closedTime = 21;
  $openTime = 8;
  $interval = 0.25; // 15 минут
  // $serviceTime = 1.5;
  // $reservedTimesStart = [$openTime, 14.25, 15, 17.25, 19, $closedTime];
  // $reservedTimesEnd   = [$openTime, 14.75, 17, 18,    20, $closedTime];

  foreach ($arrTimeStart as $item ) { // Переписываем в обычные массивы для удобства
    array_push($reservedTimesStart, $item['time']);
  }

  foreach ($arrTimeEnd as $item ) {  // Переписываем в обычные массивы для удобства
    array_push($reservedTimesEnd, $item['time_end']);
  }

  array_unshift($reservedTimesStart, $openTime); // В начало массивов добавляем 08:00
  array_unshift($reservedTimesEnd, $openTime); // В начало массивов добавляем 08:00
  array_push($reservedTimesStart, $closedTime); // В конец массивов добавляем 21:00
  array_push($reservedTimesEnd, $closedTime); // В конец массивов добавляем 21:00
      
  for ( $i = 0; $i < count($reservedTimesEnd) - 1; $i++ ) {
    /* 
      Начиная со второго элемента времен начала записи вычитаем время конца первого и делим на промежутки по 15 минут,
      чтобы понять сколько промежутков по 15 минут свободно.
      Берем целую часть числа (floor()).
    */
    $t = floor(($reservedTimesStart[$i + 1] - $reservedTimesEnd[$i]) / $interval); 

    if ($t > 0) {
      for ( $j = 0; $j < $t; $j++) {
        /*
          Если время записи + время процедуры НЕ БОЛЬШЕ чем начало следующей записи то только тогда записываем
        */
        if( ($reservedTimesEnd[$i] + $interval * $j + $serviceTime) <= $reservedTimesStart[$i + 1]) {
          array_push($timeLine, $reservedTimesEnd[$i] + $interval * $j);
        }
      }
    }
  }
  // print_r($timeLine);

  return setTimeFormat($timeLine);
};

/* -------------------- */

if(isset($_GET['date'] ) ) {
  $date = $_GET['date'];
  
  print_r(json_encode(getFreeSignTime($date, 1, 1)));

} else if(isset($_GET['service'] ) ) {
  $serv = $_GET['service'];

  $mysqli = new mysqli("localhost", "root", "", "mona");

  $masterInfo = $mysqli->query("SELECT * FROM masters where id in (select master_id from services where category_id in (select id from service_categories where name = '{$serv}'))");

  $masterInfo = $masterInfo->fetch_array(MYSQLI_ASSOC);

  print_r(json_encode($masterInfo));

} else if(isset($_GET['databaseData'] )) {

  $object = json_decode($_GET['databaseData'], true); 

  $allValuesDefined = false;

  foreach ($object as $key => $value) {

    if ( strlen($value) > 0 ) {
      $allValuesDefined = true;
    } else if ($key == 'email') {
      $allValuesDefined = true;
    } else {
      $allValuesDefined = false;
      break;
    }
  }

  if( $allValuesDefined ) { // Если все поля (кроме почты) заполнены => заполняем базу пришедшими данными
    $mysqli = new mysqli("localhost", "root", "", "mona");
    
    $marterId = $mysqli->query("SELECT id FROM masters where last_name = '{$object['masters']}';");
    $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
    $masterId = intval($marterId['id']);
    

    $queryI = $mysqli->query("INSERT INTO sign (service_id, master_id, date, time, name, phone, email) VALUES (1, {$masterId}, '{$object['date']}', '{$object['time']}', '{$object['text-name']}', '{$object['tel']}', '{$object['email']}');");

    /* TODO
      Сейчас время в базу заполняется как строке "08:00", соответственно там переводится в число 
      Надо сначало преобразовать правильно в число потом заполнять в базу 
    */ 

  }

  print_r('Готово');

} else {
  echo json_encode('Ошибка!!!');
}



  //( $date, $masterId, $serviceTime )
  // print_r(getFreeSignTime($date, 1, 1));
?>