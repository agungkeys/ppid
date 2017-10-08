<?php
	require '../../engine/db_config.php';
	$value  = $_POST["val"];
	$sql = "SELECT * FROM kategori_skpd WHERE NAMEKATSKPD = '".$value."'";
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
  	echo json_encode($data);
?>