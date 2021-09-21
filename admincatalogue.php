        <script type="text/javascript" src="assign.js"> </script>
		<script type="text/javascript" src="xhr.js"></script>
<?php
		require_once ("Dbconn.php");

		$bsearch = $_POST['bsearch'];

		$sql = "SELECT * FROM `catalogue` WHERE vname LIKE '%$bsearch%' OR transmission LIKE '%$bsearch%' OR catalogid LIKE '%$bsearch%' OR make LIKE '%$bsearch%' OR bodystyle LIKE '%$bsearch%'";
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);

		echo "<table class=\"table\" border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">Vehicle</th>\n"
				 ."<th scope=\"col\">Year</th>\n"
				 ."<th scope=\"col\">Seats</th>\n"
				 ."<th scope=\"col\">Odometer</th>\n"
                 ."<th scope=\"col\">Price</th>\n"
				 ."<th scope=\"col\">Make</th>\n"
				 ."<th scope=\"col\">Body</th>\n"
				 ."<th scope=\"col\">Fuel</th>\n"
				 ."<th scope=\"col\">Transmission</th>\n"
				 ."<th scope=\"col\">Photo</th>\n"
				 ."</tr>\n";
				 
if ($num_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["vname"]."</td>";
			echo "<td>".$row["myear"]."</td>";
			echo "<td>".$row["seats"]."</td>";
			echo "<td>".$row["odometer"]."</td>";
            echo "<td>".$row["price"]."</td>";
			echo "<td>".$row["make"]."</td>";
			echo "<td>".$row["bodystyle"]."</td>";
			echo "<td>".$row["fuel"]."</td>";
			echo "<td>".$row["transmission"]."</td>";
			echo '<td> <img src="data:image;base64,'.base64_encode($row['images']).'" class="cars" style="width:300px; height:200px; border-radius: 8px;"alt=""</td>';	
			echo "</tr>";
		}

		
    }

else if ($num_rows == 0){
    while ($row = mysqli_fetch_assoc($result)){
    }
    echo "No results found, Please try again";
}

echo "</table>";
?>