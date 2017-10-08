<?php
include '../../engine/configdb_for_ajax_datatable.php';
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'USERID',
    1 => 'USERNAME',
    2 => 'FULLNAME', 
    3 => 'USER_EMAIL',
    4 => 'LEVEL',
    5 => 'NAME',
    6 => 'DATECREATE',   
);

// getting total number records without any search
$sql = "SELECT user.USERID, user.USERNAME, user.FULLNAME, user.USER_EMAIL, user.LEVEL, skpd.NAME, user.DATECREATE";
$sql.=" FROM user INNER JOIN skpd ON user.IDSKPD = skpd.IDSKPD";
$query=mysqli_query($conn, $sql) or die("master_user_controller: Get Data User #1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT user.USERID, user.USERNAME, user.FULLNAME, user.USER_EMAIL, user.LEVEL, skpd.NAME, user.DATECREATE";
    $sql.=" FROM user INNER JOIN skpd ON user.IDSKPD = skpd.IDSKPD";
    $sql.=" WHERE user.USERID LIKE '".$requestData['search']['value']."%' ";
    // $requestData['search']['value'] contains search parameter
    $sql.=" OR user.USERNAME LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR user.FULLNAME LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR user.USER_EMAIL LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR user.LEVEL LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR skpd.NAME LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("master_user_controller: Get User from Search #2");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("master_user_controller: Get User from Search #3"); // again run query with limit
    // $num_rows = mysql_num_rows($query);
    
} else {    

    $sql = "SELECT user.USERID, user.USERNAME, user.FULLNAME, user.USER_EMAIL, user.LEVEL, skpd.NAME, user.DATECREATE";
    $sql.=" FROM user INNER JOIN skpd ON user.IDSKPD = skpd.IDSKPD";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." ";
    $query=mysqli_query($conn, $sql) or die("master_user_controller: Get User from Search false #4");
    // $num_rows = mysql_num_rows($query);
    
}




$data = array();
// for(i=1; i<=$totalFiltered; i++;)
while( $row=mysqli_fetch_array($query)) {  // preparing an array
    $nestedData=array();
    // $nestedData[] = "";
    $nestedData[] = $row["USERID"];
    $nestedData[] = $row["USERNAME"];
    $nestedData[] = $row["FULLNAME"];
    $nestedData[] = $row["USER_EMAIL"];
    $nestedData[] = $row["LEVEL"];
    $nestedData[] = $row["NAME"];
    // $nestedData[] = $row["NamaKB"];
    // $nestedData[] = $row["NIPKB"];
    $delval = $row["LEVEL"];
    
    if($delval == "Super Admin"){
        $delvalres = "<td><center>
                     <button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline' onclick='us.editUser(\"".$row['USERID']."\")'> <i class='glyphicon glyphicon-pencil'></i> </button>
                     </center></td>";
    }else{
        $delvalres = "<td><center>
                     <button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline' onclick='us.editUser(\"".$row['USERID']."\")'> <i class='glyphicon glyphicon-pencil'></i> </button>
                     <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline' onclick='us.removeUser(\"".$row['USERID']."\")'> <i class='glyphicon glyphicon-trash'></i> </button>
                     </center></td>";
    }
    $nestedData[] = $delvalres;  

    // $nestedData[] = $row['DateCreate'];
    $data[] = $nestedData;
}



$json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
            );

// for creat a number

echo json_encode($json_data);  // send data as json format

?>