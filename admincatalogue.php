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
				 ."<th scope=\"col\">catalogid</th>\n"
				 ."<th scope=\"col\">vname</th>\n"
				 ."<th scope=\"col\">myear</th>\n"
				 ."<th scope=\"col\">seats</th>\n"
				 ."<th scope=\"col\">odometer</th>\n"
                 ."<th scope=\"col\">price</th>\n"
				 ."<th scope=\"col\">make</th>\n"
				 ."<th scope=\"col\">bodystyle</th>\n"
				 ."<th scope=\"col\">fuel</th>\n"
				 ."<th scope=\"col\">transmission</th>\n"
				 ."<th scope=\"col\">Images</th>\n"
				 ."</tr>\n";
				 
if ($num_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["catalogid"]."</td>";
			echo "<td>".$row["vname"]."</td>";
			echo "<td>".$row["myear"]."</td>";
			echo "<td>".$row["seats"]."</td>";
			echo "<td>".$row["odometer"]."</td>";
            echo "<td>".$row["price"]."</td>";
			echo "<td>".$row["make"]."</td>";
			echo "<td>".$row["bodystyle"]."</td>";
			echo "<td>".$row["fuel"]."</td>";
			echo "<td>".$row["transmission"]."</td>";
			echo '<img src="data:image;base64,'.base64_encode($row['images']).'" style="width:250px; height:170px;" alt=""';	
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