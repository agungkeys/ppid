<?php
  require '../../engine/db_config.php';
              
  $id   = $_POST["idx"];
  $nm   = $_POST["1"];
  $dtl  = $_POST["2"];
  $loc  = $_POST["3"];
  $onsearc = $_POST["4"];
  $sts  = $_POST["5"];

  $timezone = "Asia/Singapore";
  date_default_timezone_set($timezone);
  $date = date('Y-m-d H:i:s');
  $sql = "UPDATE skpd SET 
    IDSKPD = '".$id."',
    NAME = '".$nm."',
    DETAIL = '".$dtl."',
    LOCATION = '".$loc."',
    ONSEARCH = '".$onsearc."',
    STATUS = '".$sts."',
    DATECREATE = '".$date."' WHERE IDSKPD = '".$id."'";
  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM skpd WHERE IDSKPD = '".$id."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();

  $sqlet = "DELETE FROM pencarian WHERE IDSKPD LIKE '".$id."'";
  $resultt = $mysqli->query($sqlet);
  echo json_encode($data);

?>