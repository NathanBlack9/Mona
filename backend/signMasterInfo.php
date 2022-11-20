<?php 

$mysqli = new mysqli("localhost", "cx88992_mona", "gx7wkWp4", "cx88992_mona");
// $mysqli = new mysqli("localhost", "root", "", "mona");

if(isset($_GET['service'] ) ) {
  
  $serv = $mysqli->real_escape_string($_GET['service']);

  // $masterInfo = $mysqli->query("select * from masters where id in (select master_id from services where category_id in (select id from service_categories where name = '$serv'))");
  $masterInfo = $mysqli->query("select * from masters where id in (select master_id from connecting where services_id in (select id from services where category_id in (select id from service_categories where name = '$serv')))");

  $masterInfo = $masterInfo->fetch_all(MYSQLI_ASSOC);

  print_r(json_encode($masterInfo));

} else {
  echo json_encode('Ошибка!!!');
}

?>