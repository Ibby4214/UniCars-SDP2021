<?php

//Connecting to the localhost database and searching for the database feedback
$sql_host="localhost"; 
$sql_user="root"; 
$sql_pass="";
$sql_db="unicars";

$conn = @mysqli_connect($sql_host ,$sql_user, $sql_pass, $sql_db);

?>