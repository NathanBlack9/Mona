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

    $config = require "config.php";
    if($config['type'] == 'dev') {
      $mysqli = new mysqli("localhost", "root", "", "mona");
    } else {
      $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
    }

    $arrTimeStart = $mysqli->query("select time FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");
    $arrTimeEnd = $mysqli->query("select time_end FROM sign where date = '{$date}' and master_id = {$masterId} order by time_end;");

    $reservedTimesStart = [];
    $reservedTimesEnd = [];
    $timeLine = [];
    $closedTime = 20;
    $openTime = 9;
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
          $todayTime = gmdate("H") + (gmdate("i") / 60) + 3; // +3 для москвы
          $today = date("Y-m-d");
          $time = $reservedTimesEnd[$i] + $interval * $j;
          if( $time + $serviceTime <= $reservedTimesStart[$i + 1]) {
            if($date == $today && $time <= $todayTime) {
              continue;
            } else {
              array_push($timeLine, $time);
            }
          }
        }
      }
    }
    // print_r($timeLine);

    return setTimeFormat($timeLine);
  };

  /* -------------------- */

  $config = require "config.php";
  if($config['type'] == 'dev') {
    $mysqli = new mysqli("localhost", "root", "", "mona");
  } else {
    $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
  }
  
  if(isset($_GET['date']) && isset($_GET['master']) && isset($_GET['serviceName']) ) {
    $date = $mysqli->real_escape_string($_GET['date']);
    $master = $mysqli->real_escape_string($_GET['master']);
    $serviceName = $mysqli->real_escape_string($_GET['serviceName']);
  
    $time = $mysqli->query("select time FROM services WHERE services_name like '%$serviceName%'");
    $time = $time->fetch_array(MYSQLI_ASSOC);
    $time = $mysqli->real_escape_string($time['time']);
  
    $masterId = $mysqli->query("select id FROM masters WHERE last_name like '%$master%'");
    $masterId = $masterId->fetch_array(MYSQLI_ASSOC);
    $masterId = intval($masterId['id']);
  
    print_r(json_encode(getFreeSignTime($date, $masterId, $time)));
  
  } else  {
    echo json_encode('Ошибка!!!');
  }

?>
