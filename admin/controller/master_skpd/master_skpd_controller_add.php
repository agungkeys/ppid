<?php
	require '../../engine/db_config.php';

	$sqq = "SELECT MAX(IDSKPD)AS ID FROM skpd";
	$rex = $mysqli->query($sqq);
	$datax = $rex->fetch_assoc();
	$dataxx = json_encode($datax);
	$dataxxx = json_decode($dataxx, true);

	$dataz = $dataxxx['ID'];
	
	if($dataz == null){
		$resid = "S0001";
	}else{
		$sq = "SELECT IDSKPD FROM skpd"; 
		$ress = $mysqli->query($sq);

		$json = [];
		while($row = $ress->fetch_assoc()){
		     $json[] = ['kode'=>substr($row['IDSKPD'], 1, 5)];
		}

		$res = json_encode(max($json));
		$res1 = json_decode($res, true);
		$res2 = $res1['kode'];
		$res3 = intval($res2);
		$res4 = $res3+1;
		$char = "S";
		$resid = $char . sprintf("%04s", $res4);
		
	}

	// echo $resid;

	$post = $_POST;
	$sql = "INSERT INTO skpd (IDSKPD, NAME, DETAIL, LOCATION, ONSEARCH, STATUS)
	VALUES (
		'".$resid."',
		'".$post['1']."',
		'".$post['2']."',
		'".$post['3']."',
		'".$post['4']."',
		'".$post['5']."'

	)";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM skpd WHERE IDSKPD = '".$resid."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>