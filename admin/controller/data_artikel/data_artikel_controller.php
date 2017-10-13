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
    0 => 'IDARTIKEL',
    1 => 'NAME',
    2 => 'JUDULARTIKEL', 
    3 => 'ISIARTIKEL',
    4 => 'IMG',
    5 => 'USER',
    6 => 'DATECREATE',
    7 => 'IDSKPD'
);

// getting total number records without any search
$sql = "SELECT artikel.IDARTIKEL, skpd.NAME, artikel.JUDULARTIKEL, artikel.ISIARTIKEL, artikel.IMG, artikel.USER, artikel.DATECREATE, artikel.IDSKPD";
$sql.=" FROM artikel INNER JOIN skpd ON artikel.IDSKPD = skpd.IDSKPD";
$query=mysqli_query($conn, $sql) or die("master_user_controller: Get Data Berita #1");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT artikel.IDARTIKEL, skpd.NAME, artikel.JUDULARTIKEL, artikel.ISIARTIKEL, artikel.IMG, artikel.USER, artikel.DATECREATE, artikel.IDSKPD";
    $sql.=" FROM artikel INNER JOIN skpd ON artikel.IDSKPD = skpd.IDSKPD";
    $sql.=" WHERE skpd.NAME LIKE '".$requestData['search']['value']."%' ";
    // $requestData['search']['value'] contains search parameter
    $sql.=" OR artikel.JUDULARTIKEL LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR artikel.IMG LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR artikel.USER LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR artikel.DATECREATE LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("master_artikel_controller: Get Artikel from Search #2");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("master_artikel_controller: Get Artikel from Search #3"); // again run query with limit
    // $num_rows = mysql_num_rows($query);
    
} else {    

    $sql = "SELECT artikel.IDARTIKEL, skpd.NAME, artikel.JUDULARTIKEL, artikel.ISIARTIKEL, artikel.IMG, artikel.USER, artikel.DATECREATE, artikel.IDSKPD";
    $sql.=" FROM artikel INNER JOIN skpd ON artikel.IDSKPD = skpd.IDSKPD";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." ";
    $query=mysqli_query($conn, $sql) or die("master_artikel_controller: Get Artikel from Search false #4");
    // $num_rows = mysql_num_rows($query);
    
}



$data = array();
// for(i=1; i<=$totalFiltered; i++;)
while( $row=mysqli_fetch_array($query)) {  // preparing an array
    $nestedData=array();
    // $nestedData[] = "";
    $nestedData[] = $row["IDARTIKEL"];
    $nestedData[] = $row["NAME"];
    $nestedData[] = $row["JUDULARTIKEL"];
    $isioriginal = $row["ISIARTIKEL"];
    $isiflat  = strip_tags($isioriginal);
    $isilimit = limit_text($isiflat, 10);
    $isi = "<span>".$isilimit."&nbsp;<a href='#' onclick='ar.previewisimodal(\"".$row["JUDULARTIKEL"]."\", \"".$row["ISIARTIKEL"]."\")'><i class='fa fa-info-circle'></i></a></span>";
    $nestedData[] = $isi;
    $nestedData[] = "<td><center><img class='img-zoom' src=\"".$row["IMG"]."\" width=60></center></td>";
    $nestedData[] = $row["USER"];
    $nestedData[] = $row["DATECREATE"];
   
    $nestedData[] = "<td><center>
                     <button data-original-title='Test' data-placement='top' data-toggle='tooltip' class='btn btn-warning btn-sm btn-outline tooltips' onclick='ar.editArtikel(\"".$row['IDARTIKEL']."\", \"".$row['IDSKPD']."\", \"".$row['NAME']."\", \"".$row['JUDULARTIKEL']."\", \"".$row['ISIARTIKEL']."\", \"".$row['IMG']."\", \"".$row['USER']."\", \"".$row['DATECREATE']."\")'> <i class='glyphicon glyphicon-pencil'></i> </button>
                     <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline' onclick='ar.removeArtikel(\"".$row['IDARTIKEL']."\", \"".$row['JUDULARTIKEL']."\")'> <i class='glyphicon glyphicon-trash'></i> </button>
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