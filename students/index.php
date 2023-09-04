<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}elseif (($_SESSION['role']) == 'user' || ($_SESSION['role']) == ''){
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link href="../css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>

</head>
<style>
  .aaa:hover {
    color: #ff66ff !important;
  }

  .tglass th,
  tr,
  td {
    background: rgba(255, 255, 255, 0.404) !important;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1) !important;
    backdrop-filter: blur(5px) !important;
    -webkit-backdrop-filter: blur(5px) !important;
    /* border: 1px solid rgba(255, 255, 255, 0.3) !important; */
  }

  th:nth-child(1) {
    border-radius: 10px 0px 0px 0px;
  }

  .ad-tb th:nth-child(6) {
    border-radius: 0px 10px 0px 0px;
  }

  .st-tb th:nth-child(9) {
    border-radius: 0px 10px 0px 0px;
  }
</style>

<body style="background: linear-gradient(to right, #ff66ff 0%, #6600cc 100%);
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">
  <?php
  include("gpa-cal.php");
  ?>


  <div class="container-fluid vh-100">
    <nav class="navbar navbar-expand-lg navc">
      <div class="container-fluid rounded-2 " style="background-color: #001f3d;">
        <a class="navbar-brand text-light" href="../index.php">
          <img src="../img/rz.png" alt="Logo" width="100" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <!-- <i class="fa-solid fa-bars" style="color:#fff; font-size:28px;"></i> -->
            <i class="bi bi-list" style="color:#fff; font-size:28px;"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto  mb-lg-0">
            <?php
            if ($_SESSION['role'] == 'super_admin') {
              echo "<li class='nav-item'>
                      <a class='nav-link text-light aaa' href='../admin/'><strong>Admin Dashboard</strong></a>
                  </li>";
              echo "<li class='nav-item'>
					<a class='nav-link text-light aaa' href='../subjects/'><strong>Add Subjects</strong></a>
					</li>";
            } elseif ($_SESSION['role'] == 'admin') {
              echo "<li class='nav-item'>
					<a class='nav-link text-light aaa' href='../subjects/'><strong>Add Subjects</strong></a>
					</li>";
            }
            ?>


            <li class="nav-item">
              <a class="nav-link text-light aaa" data-bs-toggle="modal" data-bs-target="#gpa" class="nav-link text-light" href="#"><strong>GPA</strong></a>
            </li>
          </ul>
          <div class="dropdown">
            <button class="btn btnprofile dropdown-toggle text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome <?php echo $_SESSION['name'] ?>
            </button>
            <ul class="btnprofiledropdown dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item  dropaaa text-light" data-bs-toggle="modal" data-bs-target="#profile" href="#">Profile
                  <i class="fa-solid fa-user"></i></a></li>
              <li><a class="dropdown-item  dropaaalo text-light" href="../logout.php"><span class="btnprofiledropdownlogout">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></span> </a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>


    <!--Profile Modal -->
    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-2 actionmod">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $_SESSION['name'] ?>'s Profile <i class="fa-solid fa-user"></i></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <img src="../img/rz.png" class="img-thumbnail float-end" width="80" alt="...">
            Full Name : <?php echo $_SESSION['name'] ?><br>
            User Name : <?php echo $_SESSION['valid'] ?><br>
            E-Mail : <?php echo $_SESSION['email'] ?><br>
            Index : <?php echo $_SESSION['index'] ?><br><br>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btnclose float-start">Print</button>
            <button type="button" class="btn btnclose" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Add New User Modal Start -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content actionmod">
          <div class="modal-header">
            <h5 class="modal-title">Add Student Marks</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="add-user-form" class="p-2" novalidate>
              <div class="mb-3">
                <input type="text" name="index" class="form-control form-control-lg" placeholder="Enter Index" required>
                <div class="invalid-feedback">Index is required!</div>
              </div>

              <div class="mb-3">
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Full Name" required>
                <div class="invalid-feedback">Name is required!</div>
              </div>
              <div class="row mb-3 gx-3">
                <div class="col">
                  <input type="text" name="s1_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameMaths ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>

                <div class="col">
                  <input type="text" name="s2_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameDBSM ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>
              </div>
              <div class="row mb-3 gx-3">
                <div class="col">
                  <input type="text" name="s3_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameWeb ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>

                <div class="col">
                  <input type="text" name="s4_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameEthics ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>
              </div>
              <div class="row mb-3 gx-3">
                <div class="col">
                  <input type="text" name="s5_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameOs ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>

                <div class="col">
                  <!-- <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Full Name" required>
                                <div class="invalid-feedback">Full name is required!</div> -->
                  <p class="text-muted">GPA Will calculate automatically</p>
                </div>
              </div>



              <div class="mb-3">
                <input type="submit" value="Add Marks" class="btn addbtn btn-block btn-lg" id="add-user-btn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Add New User Modal End -->

    <!-- Edit User Modal Start -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content actionmod">
          <div class="modal-header">
            <h5 class="modal-title">Edit This User</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit-user-form" class="p-2" novalidate>
              <input type="hidden" name="id" id="id">
              <div class="mb-3">
                <input type="text" name="index" id="index" class="form-control form-control-lg" placeholder="Enter Index" required>
                <div class="invalid-feedback">Index is required!</div>
              </div>

              <div class="mb-3">
                <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter Full Name" required>
                <div class="invalid-feedback">Name is required!</div>
              </div>
              <div class="row mb-3 gx-3">
                <div class="col">
                  <input type="text" name="s1_marks" id="s1_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameMaths ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>

                <div class="col">
                  <input type="text" name="s2_marks" id="s2_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameDBSM ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>
              </div>
              <div class="row mb-3 gx-3">
                <div class="col">
                  <input type="text" name="s3_marks" id="s3_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameWeb ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>

                <div class="col">
                  <input type="text" name="s4_marks" id="s4_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameEthics ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>
              </div>
              <div class="row mb-3 gx-3">
                <div class="col">
                  <input type="text" name="s5_marks" id="s5_marks" class="form-control form-control-lg" placeholder="Enter <?php echo $snameOs ?> Marks" required>
                  <div class="invalid-feedback">Marks required!</div>
                </div>

                <div class="col">
                  <!-- <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Full Name" required>
                                <div class="invalid-feedback">Full name is required!</div> -->
                  <p class="text-muted">GPA Will calculate automatically</p>
                </div>
              </div>

              <div class="mb-3">
                <input type="submit" value="Update User" class="btn editbtn btn-block btn-lg" id="edit-user-btn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit User Modal End -->
    <div class="container">
      <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
          <div>
            <h4 class="text-dark">Student Dashboard!</h4>
          </div>
          <div>
            <button class="btn addbtn" type="button" data-toggle="modal" data-target="#addNewUserModal">Add Marks</button>
          </div>
        </div>
      </div>
      <hr>

      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-light text-center tglass st-tb" id="tbb">
              <thead class="text-primary">
                <tr>
                  <th>Index</th>
                  <th>Full Name</th>
                  <th><?php echo $snameMaths ?></th>
                  <th><?php echo $snameDBSM ?></th>
                  <th><?php echo $snameWeb ?></th>
                  <th><?php echo $snameEthics ?></th>
                  <th><?php echo $snameOs ?></th>
                  <th>GPA</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="showAlert"></div>
        </div>
      </div>
    </div>




  </div>

  <!-- a BACK button to go to the index page -->


  <div>
    <!-- modal -->
    <div class="modal fade" id="gpa" tabindex="-1" aria-labelledby="gpa" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content rounded-2 actionmod">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="gpa">GPA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php
            include("../gpa/gpa3.php");
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script src="main.js"></script>

</body>

</html>