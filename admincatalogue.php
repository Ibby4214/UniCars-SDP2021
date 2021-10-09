        <script type="text/javascript" src="assign.js"> </script>
		<script type="text/javascript" src="xhr.js"></script>
<?php
		require_once ("Dbconn.php");

		$bsearch = $_POST['bsearch'];

		$sql = "SELECT * FROM `catalogue` WHERE vname LIKE '%$bsearch%' OR transmission LIKE '%$bsearch%' OR catalogid LIKE '%$bsearch%' OR make LIKE '%$bsearch%' OR bodystyle LIKE '%$bsearch%'";
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);
			?>
			
			<?php	 


