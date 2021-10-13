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
  

  $sql = "SELECT * FROM catalogue ";

  /************************************/

  if ($make!="" && $fuel=="" && $transmission=="") {
  $sql .= "WHERE make='".$make."' ";  
  }

  if ($make!="" && $fuel!="" && $transmission=="") {
    $sql .= "WHERE make='".$make."' AND fuel='".$fuel."'";  
    }

    if ($make!="" && $fuel=="" && $transmission!="") {
      $sql .= "WHERE make='".$make."' AND transmission='".$transmission."'";  
      }

  /************************************/

  if ($fuel!="" && $make=="" && $transmission=="") {
    $sql .= "WHERE fuel='".$fuel."'";  
    }
  
      if ($fuel!="" && $make=="" && $transmission!="") {
        $sql .= "WHERE fuel='".$fuel."' AND transmission='".$transmission."'";  
        }


  /************************************/

  if ($transmission!="" && $make=="" && $fuel=="") {
    $sql .= "WHERE transmission='".$transmission."'";  
    }


  /************************************/

  if ($fuel!="" && $make!="" && $transmission!="") {
  $sql .= "WHERE make='".$make."' AND fuel='".$fuel."' AND transmission='".$transmission."'";  
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
        <span class="car_text">Body style : <?php echo $row['transmission']; ?></span><br/>
        <span class="car_text">Fuel : <?php echo $row['fuel']; ?></span><br/>
      </div>
      <div class="half">
        <img class="car_image" src="image_builder.php?id=<?php echo $row['catalogid']; ?>" >
      </div>
    </div>
  </div>
</div>

<?php } ?>