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

if(isset($_GET['date']) && isset($_GET['master']) && isset($_GET['serviceName']) ) {
  $date = $_GET['date'];
  $master = $_GET['master'];
  $serviceName = $_GET['serviceName'];

  $mysqli = new mysqli("localhost", "root", "", "mona");
  $time = $mysqli->query("SELECT time FROM services WHERE services_name like '%{$serviceName}%'");
  $time = $time->fetch_array(MYSQLI_ASSOC);

  $masterId = $mysqli->query("SELECT id FROM masters WHERE last_name like '%{$master}%'");
  $masterId = $masterId->fetch_array(MYSQLI_ASSOC);
  $masterId = intval($masterId['id']);

  print_r(json_encode(getFreeSignTime($date, $masterId, $time['time'])));

} else if(isset($_GET['service'] ) ) {
  $serv = $_GET['service'];

  $mysqli = new mysqli("localhost", "root", "", "mona");

  $masterInfo = $mysqli->query("SELECT * FROM masters where id in (select master_id from services where category_id in (select id from service_categories where name = '{$serv}'))");

  $masterInfo = $masterInfo->fetch_array(MYSQLI_ASSOC);

  print_r(json_encode($masterInfo));

} else if(isset($_GET['databaseData']) && isset($_GET['serviceName']) ) {
  
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

} else if(isset($_POST['newReviewData'])) {
  // $review = $_POST['newReviewData'];

  $object = json_decode($_POST['newReviewData'], true); 

  $mysqli = new mysqli("localhost", "root", "", "mona");

  $marterId = $mysqli->query("SELECT id FROM masters where last_name = '{$object['master']}';");
  $marterId = $marterId->fetch_array(MYSQLI_ASSOC);
  $masterId = intval($marterId['id']);

  $serviceId = $mysqli->query("INSERT into reviews (master_id, name, rating, text) values ({$masterId}, '{$object['name']}', {$object['rating']}, '{$object['text']}');");
    
  print_r('Добавлен новый отзыв');
} else if(isset($_GET['allSigns'])){
  $object = json_decode($_GET['allSigns'], true); 
  
  $mysqli = new mysqli("localhost", "root", "", "mona");
  $signs = $mysqli->query("SELECT id, name, phone, date, time FROM sign where name like '%{$object['name']}%' and phone like '%{$object['tel']}%';");
  $signs = $signs->fetch_all(MYSQLI_ASSOC);

  print_r(json_encode($signs));

} else if(isset($_POST['subscriptEmail'])){
  $object = json_decode($_POST['subscriptEmail'], true); 

  $mysqli = new mysqli("localhost", "root", "", "mona");

  $queryInsert = $mysqli->query("INSERT INTO alert(email) VALUES ('{$object['email']}');");

  if (!$queryInsert) {
    echo false;
  } else {
    echo true;
  }
  
}else {
  echo json_encode('Ошибка!!!');
}




  //( $date, $masterId, $serviceTime )
  // print_r(getFreeSignTime($date, 1, 1));
?>