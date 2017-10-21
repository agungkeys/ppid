<?php
	require '../../engine/db_config.php';
	$id  = $_POST["kode"];
	$sql = "SELECT artikel.IDARTIKEL, skpd.NAME, artikel.JUDULARTIKEL, artikel.ISIARTIKEL, artikel.IMG, artikel.USER, artikel.DATECREATE, artikel.IDSKPD FROM artikel INNER JOIN skpd ON artikel.IDSKPD = skpd.IDSKPD WHERE artikel.IDARTIKEL=\"".$id."\" "; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
?>