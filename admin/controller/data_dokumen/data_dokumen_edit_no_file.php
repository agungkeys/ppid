<?php
  require '../../engine/db_config.php';
  
  $_id    = $_POST["iddokumen"];
  $_skpd    = $_POST["skpd"];
  $_namadok  = $_POST["namadok"];
  $_rangkuman  = $_POST["rangkuman"];
  $_user    = $_POST["user"];

  $timezone = "Asia/Singapore";
  date_default_timezone_set($timezone);
  $date = date('Y-m-d H:i:s');
  $sql = "UPDATE dokumen SET  
      IDSKPD            = '".$_skpd."', 
      NAMADOKUMEN       = '".$_namadok."', 
      RANGKUMANDOKUMEN  = '".$_rangkuman."', 
      USER              = '".$_user."', 
      DATECREATE        = '".$date."' WHERE IDDOKUMEN = '".$_id."'";
  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM dokumen WHERE IDDOKUMEN = '".$_id."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>