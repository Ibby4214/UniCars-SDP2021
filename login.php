<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body>
  <center>
  <h3>Sign In</h3>
  <form action="login.php" method="post">
      <table>
        <tr>
          <td>Email:</td>
          <td><input type="text" name="Email" placeholder="Enter Email Here"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="passwordd" placeholder="Enter Password Here"></td>
        </tr>

        <tr>
            <td><input type="submit" name="submit" value="Login"></td>
        </tr>
      </table>
  </form>
  </center>

  <?php
require_once("Dbconn.php");

	if (isset($_POST['submit']))
		{

			$Email=mysqli_real_escape_string($conn, $_POST['Email']);
			$passwordd=mysqli_real_escape_string($conn, $_POST['passwordd']);
			
			$sql=mysqli_query($conn, "SELECT * FROM registration WHERE  passwordd = '$passwordd' and Email ='$Email'");
			$row=mysqli_fetch_array($sql);
			$results=mysqli_num_rows($sql);
			

			if ($results > 0) 
				{			
					$_SESSION['Email'] = $row['Email'];

              echo "You have sucessfully logged in";
              echo "Please press the back home button to return to the home page";
					
				}
			else
				{
					    echo '<script type = "text/javascript">';
        			echo 'alert("You have entered the wrong Username or password! Please try again");';
        			echo 'window.location.href = "login.php" ';
        			echo '</script>';
				}
        
		}
   ?>

  <button class= "back" onclick="location.href='index.html'" class="btn-group">Back to Home</button>



</html>
