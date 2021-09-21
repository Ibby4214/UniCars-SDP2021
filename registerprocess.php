
<?php

//Calling the server setting from the Dbconn page to retrieve access to the database 
require_once ("Dbconn.php");


//When the user clicks the submit button on the form, the input value which have $ dollar sign will be enetered into the variable name in the sqaure brackets
if(isset($_POST['submit']))
{

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mnumber = $_POST['mnumber'];
    $email = $_POST['email'];
    $upassword = $_POST['upassword'];
    
    //Code will return the following error message if the page is not able to connect to the database
    if(!$conn)
    {
        echo "Sorry There was no connection Found, Please Try again";
    }

    // If there is a connection, the following varibables will be inputted into the dedicated field in the table
    else
    {

        $query = "INSERT IGNORE INTO `users`(fname,lname,mnumber,email,upassword) 
        VALUES ('$fname','$lname','$mnumber','$email','$upassword')";

        $result = mysqli_query($conn,$query) or die('Error Querying Database.');

        // Return message for the user dictating that the form have been sucessfully submitted 
        echo '<script type = "text/javascript">';
        echo 'alert("Registration complete, Returning to login");';
        echo 'window.location.href = "login.html" ';
        echo '</script>';	
        			
        
        mysqli_close($conn);

   }
    
}

?>