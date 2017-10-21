<?php
include '../../engine/configdb_for_ajax_datatable.php';
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'IDSKPD',
    1 => 'NAME',
    2 => 'PEJABAT',
    3 => 'LOCATION',
    4 => 'TELP',
    5 => 'FAX',
    6 => 'TUGASPOKOK',
    7 => 'ONSEARCH',
    8 => 'STATUS',
    9 => 'DATECREATE',   
);

// getting total number records without any search
$sql = "SELECT IDSKPD, NAME, PEJABAT, LOCATION, TELP, FAX, TUGASPOKOK, ONSEARCH, STATUS, DATECREATE";
$sql.=" FROM skpd";
$query=mysqli_query($conn, $sql) or die("master_skpd_controller: Get Data SKPD #1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT IDSKPD, NAME, PEJABAT, LOCATION, TELP, FAX, TUGASPOKOK, ONSEARCH, STATUS, DATECREATE";
    $sql.=" FROM skpd";
    $sql.=" WHERE IDSKPD LIKE '".$requestData['search']['value']."%' ";
    // $requestData['search']['value'] contains search parameter
    $sql.=" OR NAME LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR PEJABAT LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR LOCATION LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR TELP LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR FAX LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR TUGASPOKOK LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR ONSEARCH LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR STATUS LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR DATECREATE LIKE '".$requestData['search']['value']."%' ";
    // $sql.=" OR masterlokasi.SatuanKerja LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("master_skpd_controller: Get SKPD from Search #2");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("master_skpd_controller: Get SKPD from Search #3"); // again run query with limit
    // $num_rows = mysql_num_rows($query);
    
} else {    

    $sql = "SELECT IDSKPD, NAME, PEJABAT, LOCATION, TELP, FAX, TUGASPOKOK, ONSEARCH, STATUS, DATECREATE";
    $sql.=" FROM skpd";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." ";
    $query=mysqli_query($conn, $sql) or die("master_skpd_controller: Get SKPD from Search false #4");
    // $num_rows = mysql_num_rows($query);
    
}




$data = array();
// for(i=1; i<=$totalFiltered; i++;)
while( $row=mysqli_fetch_array($query)) {  // preparing an array
    $nestedData=array();
    // $nestedData[] = "";
    $nestedData[] = $row["IDSKPD"];
    $nestedData[] = $row["NAME"];
    $nestedData[] = $row["PEJABAT"];
    $nestedData[] = $row["LOCATION"];
    $nestedData[] = $row["TELP"];
    $nestedData[] = $row["FAX"];
    $nestedData[] = $row["TUGASPOKOK"];
    $nestedData[] = $row["ONSEARCH"];
    
    $st = $row["STATUS"];
    $stval = "";
    if($st != "AKTIF"){
        $stval = "<span class='label label-danger'>TIDAK AKTIF</span>";
    }else{
        $stval = "<span class='label label-success'>AKTIF</span>";
    }
    $nestedData[] = $stval;
    $datefor= date("d F Y", strtotime($row["DATECREATE"]));
    $nestedData[] = $datefor;
    // $nestedData[] = $row["NamaKB"];
    // $nestedData[] = $row["NIPKB"];
    $nestedData[] = "<td><center>
                     <button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline' onclick='skpd.edit(\"".$row['IDSKPD']."\", \"".$row['NAME']."\", \"".$row['PEJABAT']."\", \"".$row['LOCATION']."\", \"".$row['TELP']."\", \"".$row['FAX']."\", \"".$row['TUGASPOKOK']."\", \"".$row['ONSEARCH']."\", \"".$row['STATUS']."\")'> <i class='glyphicon glyphicon-pencil'></i> </button>
                     </center></td>";
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