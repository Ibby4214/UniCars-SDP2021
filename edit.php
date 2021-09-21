<!DOCTYPE html>

<?php

 require_once("Dbconn.php");
 $catalogid=$_GET['GetID'];
 $query = " SELECT * FROM catalogue WHERE catalogid='".$catalogid."'";
 $result = mysqli_query($conn,$query);

 while($row=mysqli_fetch_assoc($result))
 {
    $catalogid = $row['catalogid'];
    $vname = $row['vname'];
    $myear = $row['myear'];
    $odometer = $row['odometer'];
    $price = $row['price'];
    $make = $row['make'];
    $bodystyle = $row['bodystyle'];
    $fuel = $row['fuel'];
    $transmission = $row['transmission'];
    //$image = $row['images'];
 }

 ?>

<form action="update.php?ID=<?php echo $catalogid ?>" method="POST" enctype="multipart/form-data">

<!-- ID, Name Model Year, Number of Seats, Odometer reading and Price -->
<div class = "content"> 
<label>  <input type = "text" name = "catalogid" placeholder="Catalog ID" value = "<?php echo $catalogid ?>"></label> <br/> 
<br/> 
<label>  <input type = "text" name = "vname"  placeholder="Name"value = "<?php echo $vname ?>"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "myear"  placeholder="Model Year"value = "<?php echo $myear ?>"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "seats"  placeholder="Number of seats"value = "<?php echo $seats ?>"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "odometer"  placeholder="Odometer reading "value = "<?php echo $odometer ?>"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "price"  placeholder="Price" value = "<?php echo $price ?>"> </label> <br/> 
<br/>

<!-- Vehicle make -->
<label for = "make" > Vehicle make:</label>
<br/>
  <select id= "make" name="make" value = "<?php echo $make ?>">
    <option value="Alpha Romeo">Alpha Romeo</option>
    <option value="Aston Martin">Aston Martin</option>
    <option value="Audi">Audi</option>
    <option value="BMW">BMW</option>
    <option value="Fiat">Fiat</option>
    <option value="Ford">Ford</option>
    <option value="Holden">Holden</option>
    <option value="Honda">Honda</option>
    <option value="Jaguar">Jaguar</option>
    <option value="Jeep">Jeep</option>
    <option value="Kia">Kia</option>
    <option value="Lexus">Lexus</option>
    <option value="Mazda">Mazda</option>
    <option value="Mitsubishi">Mitsubishi</option>
    <option value="Nissan">Nissan</option>
    <option value="Subaru"> Subaru</option>
    <option value="Suzuki"> Suzuki</option>
    <option value="Toyota">Toyota</option>
    <option value="Volkswagen">Volkswagen</option>
    <option value="Volvo">Volvo</option>
  </select>
<br/>
<br/>

<!-- Vehicle Bodystyle -->
<label for = "bodystyle" >Vehicle bodystyle:</label>
<br/>
  <select id= "bodystyle" name="bodystyle" value = "<?php echo $bodystyle ?>">
    <option value = "Convertible">Convertible</option>
    <option value = "Coupe" >Coupe</option>
    <option value = "Hatchback" >Hatchback</option>
    <option value = "Sedan" >Sedan</option>
    <option value = "Station Wagon" >Station Wagon</option>
    <option value = "RV/SUV" >RV/SUV</option>
    <option value = "Ute" >Ute</option>
    <option value = "Van" >Van</option>
    <option value = "Other" >Other</option>
  </select>
  <br/>
  <br/>

<!-- Vehicle fuel -->
<label for = "fuel" > Vehicle fuel:</label>
<br/>
  <select id= "fuel" name="fuel" value = "<?php echo $fuel ?>">
    <option value = "Petrol">Petrol</option>
    <option value = "Diesel" >Diesel</option>
    <option value = "Hybrid" >Hybrid</option>
    <option value = "Electric" >Electric</option>
    <option value = "Other" >Other</option>
  </select>
  <br/>
<br/>

<!-- Transmission -->
<label> <input type = "Radio" id = "transmission" name= "transmission" value = "Automatic"></label> 
				<label for = "Automatic" > Automatic </label> 
 <label> <input type = "Radio" id = "transmission" name= "transmission" value = "Manual"> </label> 
 <label for = "Manual" > Manual </label> 
<br/>
<br/>

 <label>Vehicle images</label>
 <br>
 <input type="file" name="images" id="images"><br>
 <br/>   
 <!--  -->
	

        <!-- Submit, Update and delete -->
        <label> <input type = "submit" value = "Update" class = "submit" name = "update" > </label> 
        <br/>   
        <br/>  
        <label> <input type = "Reset" value = "Reset" class = "reset" > </label> 

</form>











