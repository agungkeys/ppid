<?php
	require '../../engine/db_config.php';
	$id  = $_POST["value"];
	$sql = "DELETE FROM kategori_skpd WHERE IDKATSKPD = '".$id."'";
	$result = $mysqli->query($sql);
	echo json_encode([$id]);
?>