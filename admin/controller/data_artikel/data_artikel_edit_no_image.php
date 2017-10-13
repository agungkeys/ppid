<?php
  require '../../engine/db_config.php';
  
  $_id    = $_POST["idartikel"];
  $_skpd    = $_POST["skpd"];
  $_judul  = $_POST["judul"];
  $_isi  = $_POST["isi"];
  $_user    = $_POST["user"];

  $timezone = "Asia/Singapore";
  date_default_timezone_set($timezone);
  $date = date('Y-m-d H:i:s');
  $sql = "UPDATE artikel SET  
      IDSKPD     = '".$_skpd."', 
      JUDULARTIKEL    = '".$_judul."', 
      ISIARTIKEL = '".$_isi."', 
      USER         = '".$_user."', 
      DATECREATE = '".$date."' WHERE IDARTIKEL = '".$_id."'";
  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM artikel WHERE IDARTIKEL = '".$_id."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>