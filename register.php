<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="homee" style="background: linear-gradient(to right, #6600cc 0%, #ff66ff 100%);animation:gradient 10s ease infinite;background-size: 200% 200%;">
	<?php
	include("connection.php");

	if (isset($_POST['submit'])) {
		$index = $_POST['index'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if ($user == "" || $pass == "" || $name == "" || $email == "") {
			echo "<div class='row'><div class='col-lg-3'></div><div class='col-lg-6 text-center justify-content-center'><p class='text-danger p-1 fs-3 text-uppercase alert alert-danger rounded-5'><br/>All fields should be filled. Either one or many fields are empty.<br/><br/><a class='btn btn-primary' href='register.php'><i class='bi bi-house-door-fill'></i> Go back</a><br/><br/></p></div><div class='col-lg-3'></div></div>";
		} else {
			mysqli_query($mysqli, "INSERT INTO user_details(`index`, name, email, username, password) VALUES('$index', '$name', '$email', '$user', md5('$pass'))")
				or die("Could not execute the insert query.");
	?>
			<div class="container">
				<div class="row mt-4">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="card icardbg mt-4">
							<div class="card-header">
								<h3 class="text-center text-light">Register</h3>
							</div>
							<div class="card-body">
								<img class="img-fluid mx-auto d-block" src="img/rz.png" width="120px">
							</div>
							<div class="card-body">

								<div>
									<p class='text-light p-4 fs-3 text-uppercase rounded-5 text-center'><br />Registration successfully<br /><br /><a class='btn btn-primary' href='login.php'>Login <i class='fa-sharp fa-solid fa-arrow-right-to-bracket'></i></a><br /><br /></p>
								</div>
								<!-- <p class="input">Please <a href="/login">Login</a> or <a href="/register">Register</a> to view your tracking link.</p> -->


							</div>
						</div>
					</div>
					<div class="col-lg-3"></div>
				</div>
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4 text-center mt-4">

					</div>
					<div class="col-lg-4"></div>
				</div>

			</div>
			<!-- // echo "<div class='h-100 d-flex align-items-center justify-content-center bgg'><div><p class='text-success p-4 fs-3 text-uppercase alert alert-success rounded-5 text-center'><br/>Registration successfully<br/><br/><a class='btn btn-primary' href='login.php'>Login <i class='fa-sharp fa-solid fa-arrow-right-to-bracket'></i></a><br/><br/></p></div></div>"; -->
		<?php
		}
	} else {
		?>
		<div class="container">
			<div class="row mt-4">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="card icardbg mt-4">
						<div class="card-header">
							<h3 class="text-center text-light">Register</h3>
						</div>
						<div class="card-body">
							<img class="img-fluid mx-auto d-block" src="img/rz.png" width="120px">
						</div>
						<div class="card-body">
							<form name="form1" method="post" action="" class=" needs-validation" novalidate>
								<div class="row mb-3 gx-3">
									<div class="col">
										<div class="form-floating">
											<input type="text" name="index" class="form-control" placeholder="Enter Index" id="validationCustom01" required>
											<label>Index</label>
											<div class="invalid-feedback">
												Please enter your Fullname.
											</div>
										</div>
									</div>

									<div class="col">
										<div class="form-floating">
											<input type="text" name="name" class="form-control" placeholder="Enter Username" id="validationCustom02" required>
											<label>Full Name</label>
											<div class="invalid-feedback">
												Please enter your Fullname.
											</div>
										</div>
									</div>

									<div class="form-floating mt-2">
										<input type="email" name="email" class="form-control" placeholder="Enter Email" id="validationCustom03" required>
										<label>Email</label>
										<div class="invalid-feedback">
											Please enter your email.
										</div>
									</div>

									<div class="col">
										<div class="form-floating mt-2">
											<input type="text" name="username" class="form-control" placeholder="Enter Username" id="validationCustomUsername" required>
											<label>User Name</label>
											<div class="invalid-feedback">
												Please enter your username.
											</div>
										</div>
									</div>

									<div class="col">
										<div class="form-floating mt-2">
											<input type="password" name="password" class="form-control" placeholder="Enter Password" id="validationCustom04" required>
											<label>Password</label>
											<div class="invalid-feedback">
												Please enter your password.
											</div>
										</div>
									</div>




									<div class="btn-group text-center d-flex mt-4">
										<input type="submit" name="submit" value="Register" class="form-control btn btnlogin">
										<input type="reset" class="form-control btn btnreset">
									</div>
									<!-- <p class="input">Please <a href="/login">Login</a> or <a href="/register">Register</a> to view your tracking link.</p> -->
							</form>
							<p class="text-light mt-4">Already have an account! <a class=" regbtn text-light p-1 rounded-2 " href="login.php">Login here!</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-3"></div>
			</div>
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 text-center mt-4">
					<a class="btn btn-warning" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a> <br />
				</div>
				<div class="col-lg-4"></div>
			</div>

		</div>





		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(() => {
				'use strict'

				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				const forms = document.querySelectorAll('.needs-validation')

				// Loop over them and prevent submission
				Array.from(forms).forEach(form => {
					form.addEventListener('submit', event => {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
			})()
		</script>

	<?php
	}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>