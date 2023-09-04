
<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM gpa ORDER BY id ASC");


// $query1 = "SELECT * FROM login WHERE id=".$_SESSION['id'];
// $result2 = $mysqli->query($query1);

// // Fetch data and assign to a PHP variable
// $data1 = $result2->fetch_assoc();
// $role = $data1['role'];
// echo $role;

// Close the connection
// $mysqli->close();
?>
	
				<table class="table tglass">
					<tr>
						<td class='text-center'>Marks</td>
						<td class='text-center'>Grade Points</td>
						<td class='text-center'>Grade Values</td>
						
					</tr>
					<?php

					while ($res = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>" . $res['marks'] . "</td>";
						echo "<td class='text-center'>" . $res['grade_points'] . "</td>";
						echo "<td class='text-center'>" . $res['grade_value'] . "</td>";
					}
					?>
				</table>
			




	