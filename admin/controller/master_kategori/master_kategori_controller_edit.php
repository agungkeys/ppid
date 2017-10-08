<?php
  require '../../engine/db_config.php';
  $idv = $_POST["idval"];
  $edv = $_POST["edval"];
  $timezone = "Asia/Singapore";
  date_default_timezone_set($timezone);
  $date = date('Y-m-d H:i:s');
  $sql = "UPDATE kategori_skpd SET NAMEKATSKPD = '".$edv."' WHERE IDKATSKPD = '".$idv."'";
  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM kategori_skpd WHERE NAMEKATSKPD = '".$edv."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>