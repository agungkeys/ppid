<?php
  require '../../engine/db_config.php';

 // idx: id, 1: namaskpd, 2: namapejabat, 3: almt, 4: telp, 5: fax, 6: cex, 7: tugaspokok, 8: status
              
  $id   = $_POST["idx"];
  $nm   = $_POST["1"];
  $nmpjbt = $_POST["2"];
  $loc    = $_POST["3"];
  $telp   = $_POST["4"];
  $fax    = $_POST["5"];
  $onsearc  = $_POST["6"];
  $tp       = $_POST["7"];
  $sts      = $_POST["8"];

  $timezone = "Asia/Singapore";
  date_default_timezone_set($timezone);
  $date = date('Y-m-d H:i:s');
  $sql = "UPDATE skpd SET 
    IDSKPD = '".$id."',
    NAME = '".$nm."',
    PEJABAT = '".$nmpjbt."',
    LOCATION = '".$loc."',
    TELP = '".$telp."',
    FAX = '".$fax."',
    ONSEARCH = '".$onsearc."',
    TUGASPOKOK = '".$tp."',
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