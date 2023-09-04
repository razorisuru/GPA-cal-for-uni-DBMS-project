<?php session_start(); ?>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
	.aaa:hover {
		color: #ff66ff !important;
	}
</style>

<body class="homee">


	<div class="container-fluid vh-100">

		<?php

		// echo $role;
		if (isset($_SESSION['valid'])) {
			include("connection.php");
			$result = mysqli_query($mysqli, "SELECT * FROM user_details");
			global $role;
			$role = $_SESSION['role'];
		?>


			<nav class="navbar navbar-expand-lg navc">
				<div class="container-fluid rounded-2" style="background-color: #001f3d;">
					<a class="navbar-brand text-light" href="index.php">
						<img src="img/rz.png" alt="Logo" width="100" class="d-inline-block align-text-top">

					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<!-- <i class="fa-solid fa-bars" style="color:#000; font-size:28px;"></i> -->
							<i class="bi bi-list" style="color:#fff; font-size:28px;"></i>
						</span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav me-auto  mb-lg-0">

							<?php if ($_SESSION['role'] == 'super_admin') {
								echo "<li class='nav-item'>
                        <a class='nav-link text-light aaa' href='admin/'><strong>Admin Dashboard</strong></a>
                    </li>";
								echo "<li class='nav-item'>
					<a class='nav-link text-light aaa' href='students/'><strong>Add Student</strong></a>
					</li>";
					echo "<li class='nav-item'>
					<a class='nav-link text-light aaa' href='subjects/'><strong>Add Subjects</strong></a>
					</li>";
							} else if ($_SESSION['role'] == 'admin') {
								echo "<li class='nav-item'>
                        <a class='nav-link text-light aaa' href='students/'><strong>Add Student<strong></a>
                    </li>";
					echo "<li class='nav-item'>
					<a class='nav-link text-light aaa' href='subjects/'><strong>Subjects</strong></a>
					</li>";
							} ?>
							<li class="nav-item">
								<a class="nav-link text-light aaa" data-bs-toggle="modal" data-bs-target="#gpa" class="nav-link text-light" href="#"><strong>GPA</strong></a>
							</li>
						</ul>
						<div class="dropdown ">
							<button class="btn btnprofile dropdown-toggle  text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								Welcome <?php echo $_SESSION['name'] ?>
							</button>
							<ul class="btnprofiledropdown dropdown-menu dropdown-menu-end w-100" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item  dropaaa text-light" data-bs-toggle="modal" data-bs-target="#profile" href="#">Profile
										<i class="fa-solid fa-user"></i></a></li>
								<li><a class="dropdown-item  dropaaalo text-light" href="logout.php"><span class="btnprofiledropdownlogout">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></span> </a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		<?php
		} else {
		?>
			<nav class="navbar sticky-top navbar-expand-lg navc">
				<div class="container-fluid rounded-2" style="background-color: #001f3d;">
					<a class="navbar-brand text-light" href="index.php">
						<img src="img/rz.png" alt="Logo" width="100" class="d-inline-block align-text-top">

					</a>
					<button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon ">
							<!-- <i class="fa-solid fa-bars" style="color:#ffffff; font-size:28px;"></i> -->
							<i class="bi bi-list" style="color:#fff; font-size:28px;"></i>
						</span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav me-auto  mb-lg-0">


							<li class="nav-item">
								<a class="nav-link text-light aaa" data-bs-toggle="modal" data-bs-target="#gpa2" class="nav-link text-light" href="#"><strong>GPA</strong></a>
							</li>
						</ul>
						<div class="float-left">
							<form class="container-fluid justify-content-start mt-2">
								<a class="btn btnlogin" href="login.php">Login</a>
								<a class="btn btnlogin" href="register.php">Register</a>
							</form>
						</div>
					</div>
				</div>
			</nav>

		<?php
		}
		?>
		<div class="container">
			<div class="row mt-4">

			</div>

			<div class="row">
				<div class="col-lg-12">
					<h1 class="display-3 text-center h1"><strong>ABC UNIVERSITY</strong></h1>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-lg-12">
					<p class="lead">Lorem ipsum dolor sit amptates veniam nihil delectus dignissimos qui blanditiis.</p>
					<a class="btn btn-success btn-lg" target="_blank" href="https://siba.edu.lk">Enroll Now <i class="bi bi-arrow-right-circle-fill"></i></a>
					<a data-bs-toggle="modal" data-bs-target="#searchm" class="btn btn-warning btn-lg" href="">Search Student <i class="bi bi-search"></i></a>

				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 mt-5">
			</div>

		</div>



	</div>


	<!--Search modal -->
	<div class="modal fade" id="searchm" tabindex="-1" aria-labelledby="searchm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content rounded-2 actionmod">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="searchm">Search Student</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					include("search/index.php");
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>



	<!-- modal -->
	<div class="modal fade" id="gpa" tabindex="-1" aria-labelledby="gpa" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content rounded-2 actionmod">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="gpa">GPA</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body ">
					<?php
					include("gpa/gpa.php");
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- modal -->
	<div class="modal fade" id="gpa2" tabindex="-1" aria-labelledby="gpa2" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content rounded-2 actionmod">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="gpa">GPA</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					include("gpa/gpa2.php");
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--Profile Modal -->
	<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content rounded-2 actionmod">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $_SESSION['name'] ?>'s Profile <i class="fa-solid fa-user"></i></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<table class="table">
							<tr>
								<td>Full Name </td>
								<td><?php echo $_SESSION['name'] ?></td>
							</tr>
							<tr>
								<td>User Name </td>
								<td><?php echo $_SESSION['valid'] ?></td>
							</tr>
							<tr>
								<td>E-Mail </td>
								<td><?php echo $_SESSION['email'] ?></td>
							</tr>
							<tr>
								<td>Index </td>
								<td><?php echo $_SESSION['index'] ?></td>
							</tr>
						</table>
					</div>


				</div>
				<div class="modal-footer justify-content-between align-items-center">
					<img src="img/rz.png" class="img-thumbnail float-start" width="80" alt="...">
					<!-- <button type="button" class="btn btn-primary float-start">Print</button> -->
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>