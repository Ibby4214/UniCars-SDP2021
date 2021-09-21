<?php 

    require_once("Dbconn.php");

    if(isset($_POST['update']))
    {
        $catalogid = $_GET['ID'];
        $vname = $_POST['vname'];
        $myear = $_POST['myear'];
        $odometer = $_POST['odometer'];
        $price = $_POST['price'];
        $make = $_POST['make'];
        $bodystyle = $_POST['bodystyle'];
        $fuel = $_POST['fuel'];
        $transmission = $_POST['transmission'];

        $query = " UPDATE catalogue SET vname='".$vname."',myear='".$myear."',odometer='".$odometer."',price='".$price."',
        make='".$make."',bodystyle='".$bodystyle."',fuel='".$fuel."',transmission='".$transmission."' WHERE catalogid='".$catalogid."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:adminhub.php");
        }
        else
        {
            echo 'Error inputting data.';
        }
    }
    else
    {
        header("location:adminhub.php");
    }


?>