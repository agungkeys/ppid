<?php
	require '../../engine/db_config.php';
	$value  = $_POST["idx"];
	$sql = "SELECT * FROM pencarian WHERE IDSKPD LIKE '".$value."'";
	$result = $mysqli->query($sql);
	// $data = $result->fetch_assoc();
 //  	echo json_encode($data);

	$jsonData = array();
	while ($array = mysqli_fetch_assoc($result)) {
	    $jsonData[] = $array;
	}
	echo json_encode($jsonData);
?>