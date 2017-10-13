<?php
  require '../../engine/db_config.php';
  
  $_ednp    = $_POST["ednmPengguna"];
  $_edps    = $_POST["edpass"];
  $_ednml   = $_POST["ednmLengkap"];
  $_edmail  = $_POST["edmail"];
  $_edlv    = $_POST["edlvl"];
  $_edlok   = $_POST["edlokasi"];

  $timezone = "Asia/Singapore";
  date_default_timezone_set($timezone);
  $date = date('Y-m-d H:i:s');
  $sql = "UPDATE user SET  
      FULLNAME     = '".$_ednml."', 
      USER_EMAIL    = '".$_edmail."', 
      USER_PASSWORD = '".base64_encode($_edps)."', 
      LEVEL         = '".$_edlv."', 
      IDSKPD        = '".$_edlok."', 
      DATECREATE = '".$date."' WHERE USERNAME = '".$_ednp."'";
  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM user WHERE USERNAME = '".$_ednp."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>