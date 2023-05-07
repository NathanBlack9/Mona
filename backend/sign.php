<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';
  $mail = new PHPMailer(true);
  $mail->CharSet = 'utf-8';

  $config = require "config.php";
  if($config['type'] == 'dev') {
    $mysqli = new mysqli("localhost", "root", "", "mona");
  } else {
    $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
  }

  if(isset($_GET['databaseData']) && isset($_GET['serviceName']) ) { // Заполнение БД записью

    $object = json_decode($_GET['databaseData'], true);
    $serviceName = $mysqli->real_escape_string($_GET['serviceName']);

    $services_info = $mysqli->query("select id, category_id, time FROM services WHERE services_name like '%$serviceName%'");
    $services_info = $services_info->fetch_array(MYSQLI_ASSOC);

    $config = require "config.php";
    if($config['type'] == 'dev') {
      $mysqli = new mysqli("localhost", "root", "", "mona");
    } else {
      $mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
    }

    $serviceId = $mysqli->real_escape_string(intval($services_info['id']));
    $categoryId = $mysqli->real_escape_string(intval($services_info['category_id']));
    $master = $mysqli->real_escape_string($object['masters']);
    $date = $mysqli->real_escape_string($object['date']);
    $name = $mysqli->real_escape_string($object['text_name']);
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

    /* ----------- Email to */
    if($config['type'] == 'prod') {
      try {
        $mail->isSMTP();
        $mail->Host = 'smtp.timeweb.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@studiomona.ru'; // Ваш логин от почты с которой будут отправляться письма
        $mail->Password = '2ia9sa/0dw5v'; // Ваш пароль от почты с которой будут отправляться письма
        // $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25; // TCP port to connect to / этот порт может отличаться у других провайдеров

        $mail->setFrom('info@studiomona.ru'); // от кого будет уходить письмо?
        $mail->addAddress('info@studiomona.ru'); // Кому будет уходить письмо

        $mail->isHTML(true);

        $mail->Subject = 'Новая онлайн запись!';
        $mail->Body    = '<h1>Новая запись!</h1></br>
                          <p>Процедура: '.$object['services'].';</p>
                          <p>Тип процедуры: '.$serviceName.';</p>
                          <p>Мастер: '.$master.';</p>
                          <p>Имя клиента: '.$name.';</p>
                          <p>Дата записи: '.$date.';</p>
                          <p>Время записи: '.$object['time'].';</p>
                          <p>Телефон: '.$phone.';</p>
                          <p>Почта: '.$email.';</p>';
        $mail->AltBody = '';
        $mail->send();

      } catch (phpmailerException $e) {
        echo $e->errorMessage();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }
    /* ----------- */

    print_r('ГОТОВО!!!');

  } else if(isset($_GET['optionVal'])) {// Проверяем выбранную услугу на стр sign
      $serviceName = $mysqli->real_escape_string($_GET['optionVal']);

      /**
       * id = 5 - Это "Маникюр, Гель-лак (однотонное покрытие)"
       * Его выводим первым, дальше поочередно
       */
      $services_info = $mysqli->query("select services_name FROM services WHERE time <> 0 and category_id = (select id from service_categories where name like '%$serviceName%') order by FIELD(id, 5) DESC;");
      $services_info = $services_info->fetch_all(MYSQLI_ASSOC);

    print_r(json_encode($services_info));
  } else if ( isset($_GET['serv']) && isset($_GET['master']) ) {

    $serviceName = $mysqli->real_escape_string($_GET['serv']);
    $masterName = $mysqli->real_escape_string($_GET['master']);

    $sss = $mysqli->query("select services_name FROM services WHERE time <> 0 and id in (select services_id from connecting where master_id = (select id from masters where last_name like '%$masterName%')) and category_id = (select id from service_categories where name like '%$serviceName%');");
    $sss = $sss->fetch_all(MYSQLI_ASSOC);

    print_r(json_encode($sss));

  } else {
    echo json_encode('Ошибка!!!');
  }

?>