<?php
header("Access-Control-Allow-Origin: *");
include "Dbconn.php";


$sql = "SELECT * FROM catalogue";
$result = mysqli_query($conn, $sql);



$catalogue = array();
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    unset($row['images']);
    $catalogue[] = $row;
  }
}

$response = array('status'=>'1','message'=>'','error'=>"",'output'=>array());
$response['output']['catalogue'] = $catalogue;

echo json_encode($response);


?>