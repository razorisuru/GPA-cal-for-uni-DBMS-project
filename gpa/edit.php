<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$marks = $_POST['marks'];
	$grade_points = $_POST['grade_points'];
	$grade_value = $_POST['grade_value'];	
	
	// checking empty fields
	if(empty($marks) || empty($grade_points) || empty($grade_value)) {
				
		if(empty($marks)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($grade_points)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($grade_value)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE gpa SET marks='$marks', grade_points='$grade_points', grade_value='$grade_value' WHERE id=$id");
		
		//redirectig to the display page.
		header("Location: ../index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM gpa WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$marks = $res['marks'];
	$grade_points = $res['grade_points'];
	$grade_value = $res['grade_value'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #6600cc 0%, #ff66ff 100%);
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">

<div class="row">
		<div class="col-md-4 mx-auto"></div>
		<div class="col-md-4 mx-auto mt-5">
			<div class="btn-group text-center d-flex mt-5">
				<a class="btn btn-outline-warning" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
				
			</div>
			

			<form name="form1" method="post" action="edit.php">
				<div class="form-floating mt-2">
					<input type="text" name="marks" value="<?php echo $marks;?>" class="form-control" placeholder="Enter Marks">
					<label>Marks</label>
				</div>
				<div class="form-floating mt-2">
					<input type="text" name="grade_points" value="<?php echo $grade_points;?>" class="form-control" placeholder="Enter Grade Points">
					<label>Grade Points</label>
				</div>
				<div class="form-floating mt-2">
					<input type="text" name="grade_value" value="<?php echo $grade_value;?>" class="form-control" placeholder="Enter Grade Value">
					<label>Grade Value</label>
				</div>
				<div class="btn-group text-center d-flex mt-2">
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					<input type="submit" name="update" value="Update" class="form-control btn btn-success">
					<input type="reset" class="form-control btn btn-danger">
				</div>
				<!-- <p class="input">Please <a href="/login">Login</a> or <a href="/register">Register</a> to view your tracking link.</p> -->
			</form>
		</div>
		<div class="col-md-4 mx-auto"></div>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
