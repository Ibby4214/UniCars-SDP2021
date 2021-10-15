<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
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

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
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

.modal-header {
  padding: 2px 16px;
  background-color: #8e53a1ff;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
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
  $sql = "SELECT * FROM catalogue WHERE make LIKE '%".$string."%'";
}

if ($_POST['type']=="filter1") {
  $string  = $_POST['string'];
  $sql = "SELECT * FROM catalogue WHERE fuel LIKE '%".$string."%'";
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
        <span class="car_text">Fuel : <?php echo $row['fuel']; ?></span><br/>
      </div>
      <div class="half">
        <img class="car_image" src="image_builder.php?id=<?php echo $row['catalogid']; ?>" >
        </div>
        </div>

<!-- Trigger/Open The Modal -->
<button id="Button">Full Listing</button>

<!-- The Modal -->
<div id="Modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h3><?php echo $row ['myear'];?></h3>
    </div>
    <div class="modal-body">
      


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
        </div>

    
    <p><?php echo $row['fulldescrip']; ?></p>
    </div>
    <div class="modal-footer">
      <h3><?php echo $row ['make'];
      echo ' ';
      echo $row['vname']; ?></h3>
      </div>
</div>
 <script> var modal = document.getElementById("Modal");

// Get the button that opens the modal
var btn = document.getElementById("Button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
     

</div>
    </div>
</div>
  </div>
  
</div>

<?php } ?>

