<?php 

$mysqli = new mysqli("localhost", "root", "", "mona");

if(isset($_GET['service'] ) ) {
  $serv = $_GET['service'];


  $masterInfo = $mysqli->query("SELECT * FROM masters where id in (select master_id from services where category_id in (select id from service_categories where name = '{$serv}'))");

  $masterInfo = $masterInfo->fetch_array(MYSQLI_ASSOC);

  print_r(json_encode($masterInfo));

} else {
  echo json_encode('Ошибка!!!');
}

?>