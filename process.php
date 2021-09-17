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

    if(!$conn)
    {
        echo "Sorry There was no connection Found, Please Try again";
    }

    // If there is a connection, the following varibables will be inputted into the dedicated field in the table
    else
    {
        $sql = "INSERT IGNORE INTO `catalogue`(catalogid, vname, myear, seats, odometer,price,make,bodystyle,fuel,transmission) 
        VALUES ('$catalogid','$vname','$myear','$seats', '$odometer','$price','$make','$bodystyle','$fuel','$transmission')";

        $result = mysqli_query($conn,$sql) or die('Error Querying Database.');

        // Return message for the user dictating that the form have been sucessfully submitted 
        echo "Database entry sucessfull! You can use the following links to return to the catalogue page";

        mysqli_close($conn);
   }
}

   if(isset($_POST['submit2']))
   {

    $file = $_FILES['file']?? "";
    $fileName = $_FILES['file']['name']?? "";
    $fileTmpName = $_FILES['file']['tmp_name']?? "";
    $fileSize = $_FILES['file']['size']?? "";
    $fileError = $_FILES['file']['error']?? "";
    $fileType = $_FILES['file']['type']?? "";

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg','png','webp');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){

            if($fileSize < 50000){

                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);              
                echo "Upload Successful";

            } else
            {
                echo "Your file is too big.";
            }

        } else{
            echo "There was an error upload your file.";
        }

    } else{

        echo "You cannot upload images of this type.";
    }
}

?>

</html>