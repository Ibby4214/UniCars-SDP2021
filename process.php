<!DOCTYPE html>
<?php

require_once ("Dbconn.php");

if(isset($_POST['submit1']))
{
    $catalogid = $_POST['catalogid'];
    $vname = $_POST['vname'];
    $myear = $_POST['myear'];
    $seats = $_POST['seats'];
    $odometer = $_POST['odometer'];
    $price = $_POST['price'];
    $make = $_POST['make'];
    $bodystyle = $_POST['bodystyle'];
    $fuel = $_POST['fuel'];
    $transmission = $_POST['transmission'];
    $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));

    if(!$conn)
    {
        echo "Sorry There was no connection Found, Please Try again";
    }

    // If there is a connection, the following varibables will be inputted into the dedicated field in the table
    else
    {
        $sql = "INSERT IGNORE INTO `catalogue`(catalogid, vname, myear, seats, odometer,price,make,bodystyle,fuel,transmission,images) 
        VALUES ('$catalogid','$vname','$myear','$seats', '$odometer','$price','$make','$bodystyle','$fuel','$transmission','$image')";

        $result = mysqli_query($conn,$sql) or die('Error Querying Database.');

        // Return message for the user dictating that the form have been sucessfully submitted 
       // echo "Database entry sucessfull! You can use the following links to return to the catalogue page";
       if ($result)
       {
            header("location:adminhub.php");
       }
       else
       {
           echo "Please check your input.";
       }
       

        mysqli_close($conn);
   }
}


if(isset($_Post['update']))
{

    $catalogid = $_POST['catalogid'];
    $vname = $_POST['vname'];
    $myear = $_POST['myear'];
    $seats = $_POST['seats'];
    $odometer = $_POST['odometer'];
    $price = $_POST['price'];
    $make = $_POST['make'];
    $bodystyle = $_POST['bodystyle'];
    $fuel = $_POST['fuel'];
    $transmission = $_POST['transmission'];
    $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));

    // $query = "UPDATE 'catalogue' SET vname='$vname',myear ='$myear',seats='$seats', odometer='$odometer',
    // price='$price',make='$make', bodystyle='$bodystyle',fuel='$fuel',transmission='$transmission',
    // images='$image' where catalogid='$catalogid' ";

    $query = "UPDATE 'catalogue' SET vname='".$vname."', myear='".$myear."',seats='".$seats."',odometer='".$odometer."',
              price='".$price."', make='".$make."',bodystyle='".$bodystyle."',fuel='".$fuel."',transmission='".$transmission."',
              image='".$image."' WHERE catalogid='".$catalogid."'";

    $queryrun= mysqli_query($conn,$query) or die('Error Querying Database.');
   

   if($query_run)
    {
        echo "run";
        //echo '<script type="text/javascript"> alert("Data updated") </script>';
    }
    else
    {
        echo "not run";
        //echo '<script type="text/javascript"> alert("Data not updated")</script>';
    }

}

?>

</html>