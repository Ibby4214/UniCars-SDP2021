<DOCTYPE html> 

<table class='table'>
<thead>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Recip</th>
    <th>Phone</th>
    <th>Message</th>
    </tr>

<tbody>

<?php 

require_once ("Dbconn.php");

$query = "SELECT * FROM `feedback1`"; 
$result = mysqli_query($conn,$query); 

if (mysqli_num_rows($result)>0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "<tr class = 'output' >"; 

        echo "<td>" , $row['fname'],"</td>";
        echo "<td>" , $row['lname'],"</td>";
        echo "<td>" , $row['recip'],"</td>";
        echo "<td>" , $row['phone'],"</td>";
        echo "<td>" , $row['message'],"</td>";

    }

}

?>

</html> 