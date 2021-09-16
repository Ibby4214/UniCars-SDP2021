<!DOCTYPE html>

<?php

//Calling the server setting from the Dbconn page to retrieve access to the database 
require_once ("Dbconn.php");

//When the user clicks the submit button on the form, the input value which have $ dollar sign will be enetered into the variable name in the sqaure brackets
if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $recip = $_POST['recip'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    //Code will return the following error message if the page is not able to connect to the database
    if(!$conn)
    {
        echo "Sorry There was no connection Found, Please Try again";
    }

    // If there is a connection, the following varibables will be inputted into the dedicated field in the table
    else
    {
        $query = "INSERT IGNORE INTO `contacts`(`fname`, `lname`, `recip`, `phone`, `message`) 
        VALUES ('$fname','$lname','$recip','$phone','$message')";

        $result = mysqli_query($conn,$query) or die('Error Querying Database.');

        // Return message for the user dictating that the form have been sucessfully submitted 
        echo "Database entry sucessfull! You can use the following links to return to the contact page";

        mysqli_close($conn);
   }
    
}

?>

</html>
		


