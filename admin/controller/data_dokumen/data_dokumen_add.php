<?php
	require '../../engine/db_config.php';

	$kat = $_POST['katskpd']; 
	$jd = $_POST['judul']; 
	$is = $_POST['isi']; 
	$ft = $_FILES['foto']['name'];
	$tm = $_FILES['foto']['tmp_name'];
	$us = $_POST['user'];

	$fotobaru = date('dmYHis').$ft;
	$path = '../../uploaddokumen/'.$fotobaru;

	$fotosimpan ='./uploaddokumen/'.$fotobaru;

	if(move_uploaded_file($tm, $path)){
		$response = array(
    		'status'=>'sukses', // Set status
    		'pesan'=>'Data berhasil disimpan' // Set pesan
   		);
	}else{
		$response = array(
    		'status'=>'gagal', // Set status
    		'pesan'=>'Data gagal disimpan' // Set pesan
   		);
	}

	echo json_encode($response);

	$post = $_POST;
	$sql = "INSERT INTO dokumen (
		IDSKPD,
		NAMADOKUMEN,
		RANGKUMANDOKUMEN,
		FILE,
		USER
	)
	VALUES (
		'".$kat."',
		'".$jd."',
		'".$is."',
		'".$fotosimpan."',
		'".$us."'
	)";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM dokumen Order by DATECREATE desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	// echo json_encode($data);
	
?>