<?php
	require '../../engine/db_config.php';

	$sql = "SELECT IDSKPD, NAME FROM skpd WHERE STATUS = 'AKTIF'"; 
	// $sql = "SELECT IDKATSKPD, NAMEKATSKPD FROM kategori_skpd WHERE NAMEKATSKPD LIKE '%".$_GET['q']."%' LIMIT 50"; 
	$result = $mysqli->query($sql);

	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = ['id'=>$row['IDSKPD'], 'text'=>$row['NAME']];
	}

	echo json_encode($json);
?>
