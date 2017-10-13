<?php
	require '../../engine/db_config.php';


	$id  = $_POST["idartikel"];

	$sql = "SELECT * FROM artikel WHERE IDARTIKEL = '".$id."'";
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();

  	$fileimage = "../.".$data['IMG'];
  	
  	if(file_exists($fileimage)){
  		unlink($fileimage);
  	}


	// echo json_encode($data);
	
	$sql = "DELETE FROM artikel WHERE IDARTIKEL = '".$id."'";
	$result = $mysqli->query($sql);
	echo json_encode([$id]);
	// echo json_encode($result);

	// if(file_exists($fileimage)){
 //  		echo "Problem Deleting Image". $fileimage;
 //  	} else {
 //  		echo "Success Deleting Image". $fileimage;

 //  	}
	
?>