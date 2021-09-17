<html>
<head>
    <title> Catalogue</title>
</head>
<body>  

    <centre> 

        <form action="" method="POST" enctype="multipart/form-data"></form>
            <thead>
                <tr>
                    <h1> Catalogue </h1>
                </tr>
            </thead>
            <?php

                include ("Dbconn.php");
                error_reporting(0);
                $query = "SELECT * FROM catalogue";
                $query_run = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($query_run))
                {
                ?>
                <!-- Gap between Make, Vehicle name, odometer etc and the values for those -->
                <table style="width:25%">
                <tr>
                 <!-- Change size of images here    -->
                <td><?php echo '<img src="data:image;base64,'.base64_encode($row['images']).'" style="width:250px; height:170px;" alt="" /><br />'; ?> </td>
                
                <?php  echo "<br>";
                    ?>
                </tr>
                  
                <tr>
                 <th>Make:</th>
                <td> <?php
                 echo $row['make'];
                 echo "<br>";?></td>
                 </tr>
                    <tr>
                         <th>Vehicle Name:</th>
                         <td>
                         <?php
                         echo $row['vname'];
                         echo "<br>";
                         ?></td>
                        </tr>
  
                        <tr>
                        <th>Model Year:</th>
                        <td>
                        <?php
                         echo $row['myear'];
                         echo "<br>";
                         ?></td>
                        </tr>

                        <tr>
                        <th>Odometer:</th>
                        <td>
                        <?php
                         echo $row['odometer'];
                         echo "<br>";
                         ?></td>
                        </tr>

                        <tr>
                        <th>Price</th>
                        <td>
                        <?php
                         echo '$ ';
                         echo $row['price'];
                         echo "<br>";
                         ?></td>
                        </tr>

                    <?php
                    
                }
                

            ?>
   

</body>
</html>