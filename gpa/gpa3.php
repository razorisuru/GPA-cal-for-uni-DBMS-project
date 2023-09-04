

<?php
//including the database connection file
include_once("../connection.php");

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
	
				<table class="table">
					<tr>
						<td class='text-center'>Marks</td>
						<td class='text-center'>Grade Points</td>
						<td class='text-center'>Grade Values</td>
						<?php
						global $role;
						$role = $_SESSION['role'];
						// echo $role;
						if ($role == 'super_admin' || $role == 'admin') {
							echo "<td class='text-center'>Update</td>";
						}
						?>
					</tr>
					<?php

					while ($res = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>" . $res['marks'] . "</td>";
						echo "<td class='text-center'>" . $res['grade_points'] . "</td>";
						echo "<td class='text-center'>" . $res['grade_value'] . "</td>";
						if ($role == 'super_admin' || $role == 'admin') {
							echo "<td class='text-center'><a class='btn btn-primary btn-sm' href=\"../gpa/edit.php?id=$res[id]\"><i class='bi bi-pencil-square'></i> Edit</a>  <a class='btn btn-danger btn-sm' href=\"../gpa/delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='bi bi-trash'></i>Delete</a></td>";
						}
					}
					?>
				</table>
			




	