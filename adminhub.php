<!DOCTYPE html>

<link rel="stylesheet" href="css/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<style type="text/css">

.slider {
  height: 1150px;
  width: 250px;

}
</style>

<!-- Initialize the slider -->
<script>
  $(document).ready(function(){
    $('.slider').bxSlider();
  });
</script>

<p> <a href = "admincp.html"> <input type="submit"value ="Go Back to Admin Control Panel"/> </a>  </p>     

<form action="process.php" method="POST" enctype="multipart/form-data">

<!-- ID, Name Model Year, Number of Seats, Odometer reading and Price -->
<div class = "content"> 
<label>  <input type = "text" name = "catalogid" placeholder="Vehicle ID"> </label> <br/> 
<br/> 
<label>  <input type = "text" name = "vname"  placeholder="Name"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "myear"  placeholder="Model Year"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "seats"  placeholder="Number of seats"> </label> <br/> 
<br/>
<label>  <input type = "number" name = "odometer"  placeholder="Odometer reading "> </label> <br/> 
<br/>
<label>  <input type = "number" name = "price"  placeholder="Price"> </label> <br/> 
<br/>

<!-- Vehicle make -->
<label for = "make" > Vehicle make:</label>
<br/>
  <select id= "make" name="make">
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
  <select id= "bodystyle" name="bodystyle">
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
  <select id= "fuel" name="fuel">
    <option value = "Petrol">Petrol</option>
    <option value = "Diesel" >Diesel</option>
    <option value = "Hybrid" >Hybrid</option>
    <option value = "Electric" >Electric</option>
    <option value = "Other" >Other</option>
  </select>
  <br/>
<br/>

<!-- Transmission -->

<label> <input type = "Radio" id = "transmission" name= "transmission" value= "Automatic">
<label for = "Automatic" > Automatic </label> 
 <label> <input type = "Radio" id = "transmission" name= "transmission" value= "Manual"> </label> 
 <label for = "Manual" > Manual </label> 
<br/>
<br/>

 <label>Vehicle images</label>
 <br>
 <input type="file" name="images" id="images">
 <br>
 <input type="file" name="images2" id="images2">
 <br>
 <input type="file" name="images3" id="images3">
 <br>
 <br>

 <label>Description</label>
 <br>
 <textarea class="contact-textarea" name="descrip" rows="4" cols="50"></textarea>
                      <br><br>

<label>Full Description</label>
 <br>
 <textarea class="contact-textarea" name="fulldescrip" rows="4" cols="50"></textarea>
                      <br><br>

 <!--  -->
	

        <!-- Submit, Update and delete -->
        <br>
        <label> <input type = "Reset" value = "Reset" class = "reset" > </label> 
         <label> <input type = "Submit" value = "Post" class = "submit" name = "submit1" > </label>
        <br>

</form>

<br> 

<?php 

    require_once("Dbconn.php");
    $query = " select * from catalogue ";
    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>View Records</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> Catalog ID </td>
                                <td> Vehicle Name </td>
                                <td> Model Year </td>
                                <td> Odometer </td>
                                <td> Price </td>
                                <td> Make </td>
                                <td> Body Style </td>
                                <td> Fuel </td>
                                <td> Transmission </td>
                                <td> Photos </td>
                                <td> More Options</td>
                                
                            </tr>

                            <?php 
                                    
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
                                        $images = '<img src="data:image;base64,'.base64_encode($row['images']).'" style="width:250px; height:170px;" alt="" /><br />';
                                        $images2 = '<img src="data:image;base64,'.base64_encode($row['images2']).'" style="width:250px; height:170px;" alt="" /><br />';
                                        $images3 = '<img src="data:image;base64,'.base64_encode($row['images3']).'" style="width:250px; height:170px;" alt="" /><br />';
                                  
                            ?>
                                    <tr>
                                        <td><?php echo $catalogid ?></td>
                                        <td><?php echo $vname ?></td>
                                        <td><?php echo $myear ?></td>
                                        <td><?php echo $odometer ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo $make ?></td>
                                        <td><?php echo $bodystyle ?></td>
                                        <td><?php echo $fuel ?></td>
                                        <td><?php echo $transmission ?></td>
                                        
                                        <td><div class="slider">
                                        <div><?php echo $images ?></div>
                                        <div><?php echo $images2 ?></div>
                                        <div><?php echo $images3 ?></div>
                                        </div></td>

                                        <td><a href="edit.php?GetID=<?php echo $catalogid ?>">Edit</a></td>
                                        <td><a href="delete.php?del=<?php echo $catalogid ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                     
                    </div>
                </div>
            </div>
        </div>      
</body>
</html>


