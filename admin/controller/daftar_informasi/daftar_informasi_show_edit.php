<?php
	require '../../engine/db_config.php';
	$id  = $_POST["kode"];
	$sql = "SELECT dokumen.IDDOKUMEN, skpd.NAME, dokumen.NAMADOKUMEN, dokumen.RANGKUMANDOKUMEN, dokumen.JENIS, dokumen.JENISNAME, dokumen.FILE, dokumen.USER, dokumen.DATECREATE, dokumen.IDSKPD FROM dokumen INNER JOIN skpd ON dokumen.IDSKPD = skpd.IDSKPD WHERE dokumen.IDDOKUMEN=\"".$id."\" "; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
?>