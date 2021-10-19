<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}


.FullButton {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}


.FullButton-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}


@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}


.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.FullButton-header {
  padding: 2px 16px;
  background-color: #8e53a1ff;
  color: white;
}

.FullButton-body {padding: 2px 16px;}

.FullButton-footer {
  padding: 2px 16px;
  background-color: #8e53a1ff;
  color: white;
}

</style>
</head>

  

<?php
header("Access-Control-Allow-Origin: *");
include "Dbconn.php";

if ($_POST['type']=="regular") {
  $sql = "SELECT * FROM catalogue";
}

if ($_POST['type']=="filter") {
  $string  = $_POST['string'];
  $make  = $_POST['make'];
  $fuel  = $_POST['fuel'];
  $transmission  = $_POST['transmission'];
  $bodystyle  = $_POST['bodystyle'];
 ;
  

  $sql = "SELECT * FROM catalogue ";

  /****************Using two drop down filters for results********************/

  if ($make!="" && $fuel!="" && $bodystyle==""&& $transmission=="") {
    $sql .= "WHERE make='".$make."' AND fuel='".$fuel."'";  
    }

    if ($make!="" && $transmission!="" && $bodystyle==""&& $fuel=="") {
      $sql .= "WHERE make='".$make."' AND transmission='".$transmission."'";  
      }

      if ($make!="" && $bodystyle!="" && $transmission==""&& $fuel=="") {
        $sql .= "WHERE make='".$make."' AND bodystyle='".$bodystyle."'";  
        }

          if ($fuel!="" && $transmission!="" && $bodystyle==""&& $make=="") {
            $sql .= "WHERE fuel='".$fuel."' AND transmission='".$transmission."'";  
            }

            if ($fuel!="" && $bodystyle!="" && $transmission==""&& $make=="") {
              $sql .= "WHERE fuel='".$fuel."' AND bodystyle='".$bodystyle."'";  
              }

              if ($transmission!="" && $bodystyle!="" && $make==""&& $make=="") {
                $sql .= "WHERE transmission='".$transmission."' AND bodystyle='".$bodystyle."'";  
                }

  /************************Using three drop down filters for a result**************************************/

        if ($make!="" && $fuel!="" && $bodystyle!=""&& $transmission=="") {
          $sql .= "WHERE make='".$make."' AND fuel='".$fuel."' AND bodystyle='".$bodystyle."'";  
          }

          if ($make!="" && $fuel!="" && $transmission!=""&& $bodystyle=="") {
            $sql .= "WHERE make='".$make."' AND fuel='".$fuel."' AND transmission='".$transmission."'";  
            }

            if ($make!="" && $transmission!="" && $bodystyle!=""&& $fuel=="") {
              $sql .= "WHERE make='".$make."' AND transmission='".$transmission."' AND bodystyle='".$bodystyle."'";  
              }
      


  /**************Single Drop down filter Option**********************/

  if ($make!="" && $fuel=="" && $transmission=="" && $bodystyle=="") {
    $sql .= "WHERE make='".$make."'";  
    }

  if ($fuel!="" && $make=="" && $transmission=="" && $bodystyle=="") {
    $sql .= "WHERE fuel='".$fuel."'";  
    }

  if ($transmission!="" && $make=="" && $fuel=="" && $bodystyle=="") {
    $sql .= "WHERE transmission='".$transmission."'";  
    }

    if ($bodystyle!="" && $make=="" && $fuel=="" && $transmission=="") {
      $sql .= "WHERE bodystyle='".$bodystyle."'";  
      }


  /***************Using all options on drop down filter*********************/

  if ($fuel!="" && $make!="" && $transmission!="" && $bodystyle!="")  {
  $sql .= "WHERE make='".$make."' AND fuel='".$fuel."' AND transmission='".$transmission."' AND bodystyle='".$bodystyle."'";  
  }
  
}


if ($_POST['type']=="search") {
  $bsearch = $_POST['string'];
    $sql = "SELECT * FROM `catalogue` WHERE vname LIKE '%$bsearch%' OR transmission LIKE '%$bsearch%' OR catalogid LIKE '%$bsearch%' OR make LIKE '%$bsearch%' OR bodystyle LIKE '%$bsearch%'";

    echo "Search Result For <b>".$bsearch."</b><br/>";
}




$result = mysqli_query($conn, $sql);


$catalogue = array();
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    unset($row['images']);
    unset($row['images2']);
    unset($row['images3']);
    $catalogue[] = $row;
  }
}


if (count($catalogue)==0) {
  echo "No Results";
}


foreach($catalogue as $row){  

?>



<div class="cat_row" >
  <div class="card"  >
    <div class="card-header">
      <?php echo $row['vname']; ?>
    </div>
    <div class="card-body text-left flex"  >
      <div class="half">
        <span class="car_text">Year : <?php echo $row['myear']; ?></span><br/>
        <span class="car_text">Seats : <?php echo $row['seats']; ?></span><br/>
        <span class="car_text">Odometer : <?php echo $row['odometer']; ?></span><br/>
        <span class="car_text">Price : <?php echo $row['price']; ?></span><br/>
        <span class="car_text">Make : <?php echo $row['make']; ?></span><br/>
        <span class="car_text">Body style : <?php echo $row['bodystyle']; ?></span><br/>
        <span class="car_text">Transmission : <?php echo $row['transmission']; ?></span><br/>
        <span class="car_text">Fuel : <?php echo $row['fuel']; ?></span><br/>
      </div>
      <div class="half">
        <img class="car_image" src="image_builder.php?id=<?php echo $row['catalogid']; ?>" >
      </div>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="unicars@gmail.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
<input type="hidden" name="currency_code" value="NZD">

<!-- Display the payment button. -->

        <p class="reminder">Please login to view purchase options</p>
<input class ="paypal" type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="Buy Now">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

<button class="toCart" onclick="location.href = 'profile.html';" id="myButton" class="float-left submit-button" >Add to cart</button>


</div>
  
<button id="Button">Full Listing</button>

<div id="FullButton" class="FullButton">

  <div class="FullButton-content">
    <div class="FullButton-header">
  
      <span class="close">&times;</span>
      <h3><?php echo $row ['myear'];?></h3>
    </div>
    <div class="FullButton-body">
      


    <div class="cat_row" >
  <div class="card"  >
    <div class="card-header">
      <?php echo $row['vname']; ?>
    </div>
    <div class="card-body text-left flex"  >
      <div class="half">
        <span class="car_text">Year : <?php echo $row['myear']; ?></span><br/>
        <span class="car_text">Seats : <?php echo $row['seats']; ?></span><br/>
        <span class="car_text">Odometer : <?php echo $row['odometer']; ?></span><br/>
        <span class="car_text">Price : <?php echo $row['price']; ?></span><br/>
        <span class="car_text">Make : <?php echo $row['make']; ?></span><br/>
        <span class="car_text">Body style : <?php echo $row['bodystyle']; ?></span><br/>
        <span class="car_text">Fuel : <?php echo $row['fuel']; ?></span><br/>
      </div>
      <div class="half">
        <img class="car_image" src="image_builder.php?id=<?php echo $row['catalogid']; ?>" >
        </div>
        <p class="descrip"><?php echo $row['fulldescrip']; ?></p>
        </div>
    </div>
    <div class="FullButton-footer">
      <h3><?php echo $row ['make'];
      echo ' ';
      echo $row['vname']; ?></h3>
      </div>
</div>

<!-- javascript file for pop up catalogue content on catalogue page -->
<script> var FullButton = document.getElementById("FullButton");
var fulllistbutton = document.getElementById("Button");
var sclose = document.getElementsByClassName("close")[0];
fulllistbutton.onclick = function() {
  FullButton.style.display = "block";
}
sclose.onclick = function() {
  FullButton.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == FullButton) {
    FullButton.style.display = "none";
  }
}
</script>

<!----------------------------------------------------------------->
     

</div>
    </div>
</div>
  </div>
  
</div>


<?php } ?>