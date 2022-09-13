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

  $mysqli = new mysqli("localhost", "root", "", "mona");
  
  if(isset($_GET['date']) && isset($_GET['master']) && isset($_GET['serviceName']) ) {
    $date = $_GET['date'];
    $master = $_GET['master'];
    $serviceName = $_GET['serviceName'];
  
    $time = $mysqli->query("SELECT time FROM services WHERE services_name like '%{$serviceName}%'");
    $time = $time->fetch_array(MYSQLI_ASSOC);
  
    $masterId = $mysqli->query("SELECT id FROM masters WHERE last_name like '%{$master}%'");
    $masterId = $masterId->fetch_array(MYSQLI_ASSOC);
    $masterId = intval($masterId['id']);
  
    print_r(json_encode(getFreeSignTime($date, $masterId, $time['time'])));
  
  } else  {
    echo json_encode('Ошибка!!!');
  }

?>