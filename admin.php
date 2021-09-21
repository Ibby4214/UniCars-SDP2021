    <script type="text/javascript" src="assign.js"> </script>
		<script type="text/javascript" src="xhr.js"></script>
<?php
		require_once("Dbconn.php");
		
		$bsearch = $_POST['bsearch'];

        error_reporting(E_ERROR | E_PARSE);
        $query = "SELECT * FROM contacts WHERE recip LIKE '%$bsearch%'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		echo "<table class=\"table\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">First Name</th>\n"
				 ."<th scope=\"col\">Last Name</th>\n"
				 ."<th scope=\"col\">Recipient</th>\n"
				 ."<th scope=\"col\">Phone</th>\n"
				 ."<th scope=\"col\">Message</th>\n"
				 ."</tr>\n";
if ($num_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["fname"]."</td>";
			echo "<td>".$row["lname"]."</td>";
			echo "<td>".$row["recip"]."</td>";
			echo "<td>".$row["phone"]."</td>";
			echo "<td>".$row["message"]."</td>";
			echo "</tr>";
		}
}
echo "</table>";
?>
