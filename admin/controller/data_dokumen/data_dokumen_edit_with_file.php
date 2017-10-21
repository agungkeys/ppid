<?php
	require '../../engine/db_config.php';

	$iddokumen 	= $_POST['iddokumen']; 
	$kat 		= $_POST['katskpd']; 
	$nmdok 		= $_POST['namadokumen']; 
	$rangkuman 	= $_POST['rangkuman']; 
	$jenisdok 	= $_POST['jenisdokumen']; 
	$jenisdoknm = $_POST['jenisname']; 
	$ft 		= $_FILES['file']['name'];
	$tm 		= $_FILES['file']['tmp_name'];
	$us 		= $_POST['user'];

	$fotobaru 	= date('dmYHis').$ft;
	$path 		= '../../uploaddokumen/'.$fotobaru;

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

	$timezone = "Asia/Singapore";
	date_default_timezone_set($timezone);
	$date = date('Y-m-d H:i:s');
	$sql = "UPDATE dokumen SET  
		IDSKPD     		= '".$kat."', 
		NAMADOKUMEN    	= '".$nmdok."', 
		RANGKUMANDOKUMEN = '".$rangkuman."', 
		JENIS 			= '".$jenisdok."', 
		JENISNAME 		= '".$jenisdoknm."', 
		FILE         	= '".$fotosimpan."', 
		USER        	= '".$us."', 
		DATECREATE 		= '".$date."' WHERE IDDOKUMEN = '".$iddokumen."'";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM dokumen WHERE IDDOKUMEN = '".$iddokumen."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	// echo json_encode($data);
	
?> 