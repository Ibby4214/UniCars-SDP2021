<?php
require_once("Dbconn.php");

	if (isset($_POST['submit']))
		{

			$email=mysqli_real_escape_string($conn, $_POST['email']);
			$passwordd=mysqli_real_escape_string($conn, $_POST['passwordd']);
			
			$sql=mysqli_query($conn, "SELECT * FROM adminlogin WHERE  passwordd = '$passwordd' and email ='$email'");
			$row=mysqli_fetch_array($sql);
			$output=mysqli_num_rows($sql);
			

			if ($output > 0) 
				{			
					$_SESSION['Email'] = $row['Email'];
				echo '<script type = "text/javascript">';
				echo 'alert("You have sucessfully logged in");';
				echo 'window.location.href = "admin.html" ';
				echo '</script>';
            	
				}
			else
				{
					echo '<script type = "text/javascript">';
        			echo 'alert("You have entered the wrong Username or password! Please try again");';
        			echo 'window.location.href = "login.html" ';
        			echo '</script>';
				}
        
		}
   ?>