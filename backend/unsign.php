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

  if(isset($_GET['unsign']) && isset($_GET['unsignData'])){// Удаление записи и вывод всех оставшихся записей
    
    $object = json_decode($_GET['unsignData'], true); 
    $id = $mysqli->real_escape_string($_GET['unsign']); 
    $connectedID = $mysqli->real_escape_string($_GET['unsign'] - 1);
    $name = $mysqli->real_escape_string($object['name']);
    $phone = $mysqli->real_escape_string($object['tel']);

    // Получаем данные о записи которая будет удалена, чтобы отправлять на почту
    $dataForEmailAfterDelete = $mysqli->query("select masters.last_name as master, service_categories.name as service, services.services_name as service_type, sign.date, sign.time, sign.name, sign.phone, sign.email from sign INNER JOIN masters ON masters.id = sign.master_id INNER JOIN services ON services.id = sign.service_id INNER JOIN service_categories ON service_categories.id = services.category_id where sign.id = $id;"); 
    $dataForEmailAfterDelete = $dataForEmailAfterDelete->fetch_array(MYSQLI_ASSOC);
    
    $deleteSign = $mysqli->query("delete from sign where id = $id;"); // Удаляем запись

    $typeOfDeletingService = $mysqli->query("select category_id as id FROM `services` WHERE id = (select service_id from sign where id = $connectedID);");
    $typeOfDeletingService = $typeOfDeletingService->fetch_array(MYSQLI_NUM);

    if($typeOfDeletingService[0] == 2 || $typeOfDeletingService[0] == 4) {
      $deleteSign = $mysqli->query("delete from sign where id = $connectedID;"); // Удаляем связанную запись для наращиавния/педикюра
    }

    $signs = $mysqli->query("select id, name, phone, date, time FROM sign where name like '%$name%' and phone like '%$phone%';");
    $signs = $signs->fetch_all(MYSQLI_ASSOC);


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
        
        $mail->Subject = 'Отмена записи!';
        $mail->Body    = '<h1>Отмена записи!</h1></br>
                          <p>Процедура: '.$dataForEmailAfterDelete['service'].';</p>
                          <p>Тип процедуры: '.$dataForEmailAfterDelete['service_type'].';</p>
                          <p>Мастер: '.$dataForEmailAfterDelete['master'].';</p>
                          <p>Имя клиента: '.$dataForEmailAfterDelete['name'].';</p>
                          <p>Дата записи: '.$dataForEmailAfterDelete['date'].';</p>
                          <p>Время записи: '.$dataForEmailAfterDelete['time'].';</p>
                          <p>Телефон: '.$dataForEmailAfterDelete['phone'].';</p>
                          <p>Почта: '.$dataForEmailAfterDelete['email'].';</p>';
        $mail->send();
        
      } catch (phpmailerException $e) {
        echo $e->errorMessage();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    /* ----------- */

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