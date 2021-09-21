<?php

require_once("Dbconn.php");

if(isset($_GET['del']))
         {
             $catalogid = $_GET['del'];
             $query = "DELETE FROM catalogue WHERE catalogid = '".$catalogid."'";
             $result = mysqli_query($conn,$query);
             if($result)
             {
                 header("location:adminhub.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:adminhub.php");
         }

?>