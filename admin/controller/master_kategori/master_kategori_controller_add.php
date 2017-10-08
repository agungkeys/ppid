<?php
	require '../../engine/db_config.php';

	$sqq = "SELECT MAX(IDKATSKPD)AS ID FROM kategori_skpd";
	$rex = $mysqli->query($sqq);
	$datax = $rex->fetch_assoc();
	$dataxx = json_encode($datax);
	$dataxxx = json_decode($dataxx, true);

	$dataz = $dataxxx['ID'];
	
	if($dataz == null){
		$resid = "K0001";
	}else{
		$sq = "SELECT IDKATSKPD FROM kategori_skpd"; 
		$ress = $mysqli->query($sq);

		$json = [];
		while($row = $ress->fetch_assoc()){
		     $json[] = ['kode'=>substr($row['IDKATSKPD'], 1, 5)];
		}

		$res = json_encode(max($json));
		$res1 = json_decode($res, true);
		$res2 = $res1['kode'];
		$res3 = intval($res2);
		$res4 = $res3+1;
		$char = "K";
		$resid = $char . sprintf("%04s", $res4);
		// echo $resid;
	}

	$post = $_POST;
	$sql = "INSERT INTO kategori_skpd (IDKATSKPD, NAMEKATSKPD)
	VALUES (
		'".$resid."',
		'".$post['valkt']."'

	)";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM kategori_skpd WHERE IDKATSKPD = '".$resid."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>