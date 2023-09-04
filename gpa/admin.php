<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	// $id = $_POST['id'];
	$id = $_SESSION['id'];
	$name = $_POST['name'];
	$role = $_POST['role'];
	$username = $_POST['username'];	
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE login SET name='$name', role='$role', username='$username' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
// $id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM login");

while($res = mysqli_fetch_array($result))
{
	$id = $res['id'];
	$name = $res['name'];
	$role = $res['role'];
	$username = $res['username'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="background: url(img/bg.jpg);
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">

<div class="row">
		<div class="col-md-4 mx-auto"></div>
		<div class="col-md-4 mx-auto mt-5">
			<div class="btn-group text-center d-flex mt-2">
				<a class="btn btn-outline-warning" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
				<a class="btn btn-outline-success" href="view.php"><i class="bi bi-collection"></i> View Products</a>
				<a class="btn btn-outline-danger" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
			</div>
			

			<form name="form1" method="post" action="edit.php">
				<div class="form-floating mt-2">
					<input type="text" name="name" value="<?php echo $id;?>" class="form-control" placeholder="Enter Username">
					<label>Name</label>
				</div>
				<div class="form-floating mt-2">
					<input type="text" name="qty" value="<?php echo $name;?>" class="form-control" placeholder="Enter Username">
					<label>Qty</label>
				</div>
				<div class="form-floating mt-2">
					<input type="text" name="price" value="<?php echo $username;?>" class="form-control" placeholder="Enter Username">
					<label>Price</label>
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
