<?php
	require '../../engine/db_config.php';

	$post = $_POST;
	$sql = "INSERT INTO user (
		USERNAME, 
		FULLNAME,
		USER_EMAIL,
		USER_PASSWORD,
		LEVEL,
		IDSKPD
	)
	VALUES (
		'".$post['usNm']."',
		'".$post['usNmFull']."',
		'".$post['usMail']."',
		'".base64_encode($post['usPass'])."',
		'".$post['usLvl']."',
		'".$post['usLok']."'
	)";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM user Order by DateCreate desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
?>