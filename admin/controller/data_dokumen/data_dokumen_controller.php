<?php
include '../../engine/configdb_for_ajax_datatable.php';

function limit_text($text, $limit) {
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '  ';
  }
  return $text;
}
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'IDDOKUMEN',
    1 => 'NAME',
    2 => 'NAMADOKUMEN', 
    3 => 'RANGKUMANDOKUMEN',
    4 => 'FILE',
    5 => 'USER',
    6 => 'DATECREATE',
    7 => 'IDSKPD'
);

// getting total number records without any search
$sql = "SELECT dokumen.IDDOKUMEN, skpd.NAME, dokumen.NAMADOKUMEN, dokumen.RANGKUMANDOKUMEN, dokumen.FILE, dokumen.USER, dokumen.DATECREATE, dokumen.IDSKPD";
$sql.=" FROM dokumen INNER JOIN skpd ON dokumen.IDSKPD = skpd.IDSKPD";
$query=mysqli_query($conn, $sql) or die("master_dokumen_controller: Get Data Dokumen #1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT dokumen.IDDOKUMEN, skpd.NAME, dokumen.NAMADOKUMEN, dokumen.RANGKUMANDOKUMEN, dokumen.FILE, dokumen.USER, dokumen.DATECREATE, dokumen.IDSKPD";
    $sql.=" FROM dokumen INNER JOIN skpd ON dokumen.IDSKPD = skpd.IDSKPD";
    $sql.=" WHERE skpd.NAME LIKE '".$requestData['search']['value']."%' ";
    // $requestData['search']['value'] contains search parameter
    $sql.=" OR dokumen.NAMADOKUMEN LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR dokumen.RANGKUMANDOKUMEN LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR dokumen.FILE LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR dokumen.USER LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR dokumen.DATECREATE LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("master_dokumen_controller: Get Dokumen from Search #2");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("master_dokumen_controller: Get Dokumen from Search #3"); // again run query with limit
    // $num_rows = mysql_num_rows($query);
    
} else {    

    $sql = "SELECT dokumen.IDDOKUMEN, skpd.NAME, dokumen.NAMADOKUMEN, dokumen.RANGKUMANDOKUMEN, dokumen.FILE, dokumen.USER, dokumen.DATECREATE, dokumen.IDSKPD";
    $sql.=" FROM dokumen INNER JOIN skpd ON dokumen.IDSKPD = skpd.IDSKPD";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." ";
    $query=mysqli_query($conn, $sql) or die("master_artikel_controller: Get Artikel from Search false #4");
    // $num_rows = mysql_num_rows($query);
    
}



$data = array();
// for(i=1; i<=$totalFiltered; i++;)
while( $row=mysqli_fetch_array($query)) {  // preparing an array
    $nestedData=array();
    // $nestedData[] = "";
    $nestedData[] = $row["IDDOKUMEN"];
    $nestedData[] = $row["NAME"];
    $nestedData[] = $row["NAMADOKUMEN"];
    $isioriginal = $row["RANGKUMANDOKUMEN"];
    $isiflat  = strip_tags($isioriginal);
    $isilimit = limit_text($isiflat, 10);
    $isi = "<span>".$isilimit."&nbsp;<a href='#' onclick='dok.previewisimodal(\"".$row["NAMADOKUMEN"]."\", \"".$row["RANGKUMANDOKUMEN"]."\")'><i class='fa fa-info-circle'></i></a></span>";
    $nestedData[] = $isi;
    // $nestedData[] = "<td><center><img class='img-zoom' src=\"".$row["IMG"]."\" width=60></center></td>";
    $nestedData[] = "<a target='_blank' href=\"".$row["FILE"]."\" data-toggle='tooltip' title='Download File' class='btn btn-primary btn-sm btn-outline'><i class='glyphicon glyphicon-save-file'></i> Download</a>";
    $nestedData[] = $row["USER"];
    $nestedData[] = $row["DATECREATE"];
   
    $nestedData[] = "<td><center>
                     <button data-original-title='Test' data-placement='top' data-toggle='tooltip' class='btn btn-warning btn-sm btn-outline tooltips' onclick='dok.editDokumen(\"".$row['IDDOKUMEN']."\", \"".$row['IDSKPD']."\", \"".$row['NAME']."\", \"".$row['NAMADOKUMEN']."\", \"".$row['RANGKUMANDOKUMEN']."\", \"".$row['FILE']."\", \"".$row['USER']."\", \"".$row['DATECREATE']."\")'> <i class='glyphicon glyphicon-pencil'></i> </button>
                     <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline' onclick='dok.removeDokumen(\"".$row['IDDOKUMEN']."\", \"".$row['NAME']."\")'> <i class='glyphicon glyphicon-trash'></i> </button>
                     </center></td>";

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