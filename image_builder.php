<?php
header('Content-type: image/png'); 
include "Dbconn.php";


$id = $_GET['id'];

$sql = "SELECT images FROM catalogue WHERE catalogid=".$id;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
     echo $row['images'];
  }
} 

?>