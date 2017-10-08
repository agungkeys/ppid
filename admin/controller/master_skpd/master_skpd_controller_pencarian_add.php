<?php
	require '../../engine/db_config.php';


	$data = $_REQUEST['data'];

	if(is_array($data)){

	    $sql = "INSERT INTO pencarian (IDSEARCH, IDSKPD, IDKATSKPD, NAMEKATSKPD) values ";

	    $valuesArr = array();
	    foreach($data as $row){

	    	$nomer = mysqli_real_escape_string( $mysqli, $row['no'] );
	        $id = mysqli_real_escape_string( $mysqli, $row['idskpd'] );
	        $idkskpd = mysqli_real_escape_string( $mysqli, $row['idkatskpd'] );
	        $nskpd = mysqli_real_escape_string( $mysqli, $row['nmskpd'] );

	        $valuesArr[] = "('$nomer', '$id', '$idkskpd', '$nskpd')";
	    }

	    $sql .= implode(',', $valuesArr);

	    $result = $mysqli->query($sql);
		$sqlt = "SELECT * FROM pencarian WHERE IDSEARCH = '0'"; 
		$resulta = $mysqli->query($sqlt);
		$data = $resulta->fetch_assoc();
		echo json_encode($data);
	}
?>