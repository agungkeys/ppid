<?php
	require '../../engine/db_config.php';
	$id  = $_POST["kode"];
	$sql = "SELECT * FROM skpd WHERE IDSKPD = '".$id."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
?>
