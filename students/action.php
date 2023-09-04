<?php

require_once 'db.php';
require_once 'util.php';
require_once 'gpa-cal.php';

$db = new Database;
$util = new Util;

// Handle Add New User Ajax Request
if (isset($_POST['add'])) {
  $index = $util->testInput($_POST['index']);
  $name = $util->testInput($_POST['name']);
  $s1markst = $util->testInput($_POST['s1_marks']);
  $s2markst = $util->testInput($_POST['s2_marks']);
  $s3markst = $util->testInput($_POST['s3_marks']);
  $s4markst = $util->testInput($_POST['s4_marks']);
  $s5markst = $util->testInput($_POST['s5_marks']);

  if ($s1markst <= 100 && $s1markst >= 80) {
    $s1marks = "A";
  } elseif ($s1markst <= 79 && $s1markst >= 70) {
    $s1marks = "A-";
  } elseif ($s1markst <= 69 && $s1markst >= 65) {
    $s1marks = "B+";
  } elseif ($s1markst <= 64 && $s1markst >= 60) {
    $s1marks = "B";
  } elseif ($s1markst <= 59 && $s1markst >= 55) {
    $s1marks = "B-";
  } elseif ($s1markst <= 54 && $s1markst >= 50) {
    $s1marks = "C+";
  } elseif ($s1markst <= 49 && $s1markst >= 45) {
    $s1marks = "C";
  } elseif ($s1markst <= 44 && $s1markst >= 40) {
    $s1marks = "C-";
  } elseif ($s1markst <= 39 && $s1markst >= 35) {
    $s1marks = "D+";
  } elseif ($s1markst <= 34 && $s1markst >= 30) {
    $s1marks = "D";
  } else {
    $s1marks = "F";
  };


  if ($s2markst <= 100 && $s2markst >= 80) {
    $s2marks = "A";
  } elseif ($s2markst <= 79 && $s2markst >= 70) {
    $s2marks = "A-";
  } elseif ($s2markst <= 69 && $s2markst >= 65) {
    $s2marks = "B+";
  } elseif ($s2markst <= 64 && $s2markst >= 60) {
    $s2marks = "B";
  } elseif ($s2markst <= 59 && $s2markst >= 55) {
    $s2marks = "B-";
  } elseif ($s2markst <= 54 && $s2markst >= 50) {
    $s2marks = "C+";
  } elseif ($s2markst <= 49 && $s2markst >= 45) {
    $s2marks = "C";
  } elseif ($s2markst <= 44 && $s2markst >= 40) {
    $s2marks = "C-";
  } elseif ($s2markst <= 39 && $s2markst >= 35) {
    $s2marks = "D+";
  } elseif ($s2markst <= 34 && $s2markst >= 30) {
    $s2marks = "D";
  } else {
    $s2marks = "F";
  };


  if ($s3markst <= 100 && $s3markst >= 80) {
    $s3marks = "A";
  } elseif ($s3markst <= 79 && $s3markst >= 70) {
    $s3marks = "A-";
  } elseif ($s3markst <= 69 && $s3markst >= 65) {
    $s3marks = "B+";
  } elseif ($s3markst <= 64 && $s3markst >= 60) {
    $s3marks = "B";
  } elseif ($s3markst <= 59 && $s3markst >= 55) {
    $s3marks = "B-";
  } elseif ($s3markst <= 54 && $s3markst >= 50) {
    $s3marks = "C+";
  } elseif ($s3markst <= 49 && $s3markst >= 45) {
    $s3marks = "C";
  } elseif ($s3markst <= 44 && $s3markst >= 40) {
    $s3marks = "C-";
  } elseif ($s3markst <= 39 && $s3markst >= 35) {
    $s3marks = "D+";
  } elseif ($s3markst <= 34 && $s3markst >= 30) {
    $s3marks = "D";
  } else {
    $s3marks = "F";
  };


  if ($s4markst <= 100 && $s4markst >= 80) {
    $s4marks = "A";
  } elseif ($s4markst <= 79 && $s4markst >= 70) {
    $s4marks = "A-";
  } elseif ($s4markst <= 69 && $s4markst >= 65) {
    $s4marks = "B+";
  } elseif ($s4markst <= 64 && $s4markst >= 60) {
    $s4marks = "B";
  } elseif ($s4markst <= 59 && $s4markst >= 55) {
    $s4marks = "B-";
  } elseif ($s4markst <= 54 && $s4markst >= 50) {
    $s4marks = "C+";
  } elseif ($s4markst <= 49 && $s4markst >= 45) {
    $s4marks = "C";
  } elseif ($s4markst <= 44 && $s4markst >= 40) {
    $s4marks = "C-";
  } elseif ($s4markst <= 39 && $s4markst >= 35) {
    $s4marks = "D+";
  } elseif ($s4markst <= 34 && $s4markst >= 30) {
    $s4marks = "D";
  } else {
    $s4marks = "F";
  };


  if ($s5markst <= 100 && $s5markst >= 80) {
    $s5marks = "A";
  } elseif ($s5markst <= 79 && $s5markst >= 70) {
    $s5marks = "A-";
  } elseif ($s5markst <= 69 && $s5markst >= 65) {
    $s5marks = "B+";
  } elseif ($s5markst <= 64 && $s5markst >= 60) {
    $s5marks = "B";
  } elseif ($s5markst <= 59 && $s5markst >= 55) {
    $s5marks = "B-";
  } elseif ($s5markst <= 54 && $s5markst >= 50) {
    $s5marks = "C+";
  } elseif ($s5markst <= 49 && $s5markst >= 45) {
    $s5marks = "C";
  } elseif ($s5markst <= 44 && $s5markst >= 40) {
    $s5marks = "C-";
  } elseif ($s5markst <= 39 && $s5markst >= 35) {
    $s5marks = "D+";
  } elseif ($s5markst <= 34 && $s5markst >= 30) {
    $s5marks = "D";
  } else {
    $s5marks = "F";
  };

  $gpa_query_s1 = "SELECT * FROM gpa where grade_points='{$s1marks}'";               // GPA
  $gpa_s1 = mysqli_query($mysqli, $gpa_query_s1);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s1)) {
    $gvs1 = $row['grade_value'];
  }

  $gpa_query_s2 = "SELECT * FROM gpa where grade_points='{$s2marks}'";               // GPA 2
  $gpa_s2 = mysqli_query($mysqli, $gpa_query_s2);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s2)) {
    $gvs2 = $row['grade_value'];
  }

  $gpa_query_s3 = "SELECT * FROM gpa where grade_points='{$s3marks}'";               // GPA
  $gpa_s3 = mysqli_query($mysqli, $gpa_query_s3);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s3)) {
    $gvs3 = $row['grade_value'];
  }

  $gpa_query_s4 = "SELECT * FROM gpa where grade_points='{$s4marks}'";               // GPA
  $gpa_s4 = mysqli_query($mysqli, $gpa_query_s4);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s4)) {
    $gvs4 = $row['grade_value'];
  }


  $gpa_query_s5 = "SELECT * FROM gpa where grade_points='{$s5marks}'";               // GPA
  $gpa_s5 = mysqli_query($mysqli, $gpa_query_s5);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s5)) {
    $gvs5 = $row['grade_value'];
  }

  $tot_credits = $scdMaths + $scdDBSM + $scdDWeb + $scdEthics + $scdOs;
  $gpa =  (($gvs1 * $scdMaths) + ($gvs2 * $scdDBSM) + ($gvs3 * $scdDWeb) + ($gvs4 * $scdEthics) + ($gvs5 * $scdOs)) / $tot_credits;

  // $gpa = $util->testInput($_POST['gpa']);

  if ($db->insert($index, $name, $s1marks, $s2marks, $s3marks, $s4marks, $s5marks, $gpa)) {
    echo $util->showMessage('success', 'User inserted successfully!');
  } else {
    echo $util->showMessage('danger', 'Something went wrong!');
  }
}

// Handle Fetch All Users Ajax Request
if (isset($_GET['read'])) {
  $users = $db->read();
  $output = '';
  if ($users) {
    foreach ($users as $row) {
      $output .= '<tr>
                      <td>' . $row['index'] . '</td>
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['s1_marks'] . '</td>
                      <td>' . $row['s2_marks'] . '</td>
                      <td>' . $row['s3_marks'] . '</td>
                      <td>' . $row['s4_marks'] . '</td>
                      <td>' . $row['s5_marks'] . '</td>
                      <td>' . $row['gpa'] . '</td>
                      <td>
                        <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                        <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                      </td>
                    </tr>';
    }
    echo $output;
  } else {
    echo '<tr>
              <td class="text-danger" colspan="9">No Users Found in the Database!</td>
            </tr>';
  }
}

// Handle Edit User Ajax Request
if (isset($_GET['edit'])) {
  $id = $_GET['id'];

  $user = $db->readOne($id);
  echo json_encode($user);
}

// Handle Update User Ajax Request
if (isset($_POST['update'])) {
  $id = $util->testInput($_POST['id']);
  $index = $util->testInput($_POST['index']);
  $name = $util->testInput($_POST['name']);
  $s1markst = $util->testInput($_POST['s1_marks']);
  $s2markst = $util->testInput($_POST['s2_marks']);
  $s3markst = $util->testInput($_POST['s3_marks']);
  $s4markst = $util->testInput($_POST['s4_marks']);
  $s5markst = $util->testInput($_POST['s5_marks']);

  if ($s1markst <= 100 && $s1markst >= 80) {
    $s1marks = "A";
  } elseif ($s1markst <= 79 && $s1markst >= 70) {
    $s1marks = "A-";
  } elseif ($s1markst <= 69 && $s1markst >= 65) {
    $s1marks = "B+";
  } elseif ($s1markst <= 64 && $s1markst >= 60) {
    $s1marks = "B";
  } elseif ($s1markst <= 59 && $s1markst >= 55) {
    $s1marks = "B-";
  } elseif ($s1markst <= 54 && $s1markst >= 50) {
    $s1marks = "C+";
  } elseif ($s1markst <= 49 && $s1markst >= 45) {
    $s1marks = "C";
  } elseif ($s1markst <= 44 && $s1markst >= 40) {
    $s1marks = "C-";
  } elseif ($s1markst <= 39 && $s1markst >= 35) {
    $s1marks = "D+";
  } elseif ($s1markst <= 34 && $s1markst >= 30) {
    $s1marks = "D";
  } else {
    $s1marks = "F";
  };


  if ($s2markst <= 100 && $s2markst >= 80) {
    $s2marks = "A";
  } elseif ($s2markst <= 79 && $s2markst >= 70) {
    $s2marks = "A-";
  } elseif ($s2markst <= 69 && $s2markst >= 65) {
    $s2marks = "B+";
  } elseif ($s2markst <= 64 && $s2markst >= 60) {
    $s2marks = "B";
  } elseif ($s2markst <= 59 && $s2markst >= 55) {
    $s2marks = "B-";
  } elseif ($s2markst <= 54 && $s2markst >= 50) {
    $s2marks = "C+";
  } elseif ($s2markst <= 49 && $s2markst >= 45) {
    $s2marks = "C";
  } elseif ($s2markst <= 44 && $s2markst >= 40) {
    $s2marks = "C-";
  } elseif ($s2markst <= 39 && $s2markst >= 35) {
    $s2marks = "D+";
  } elseif ($s2markst <= 34 && $s2markst >= 30) {
    $s2marks = "D";
  } else {
    $s2marks = "F";
  };


  if ($s3markst <= 100 && $s3markst >= 80) {
    $s3marks = "A";
  } elseif ($s3markst <= 79 && $s3markst >= 70) {
    $s3marks = "A-";
  } elseif ($s3markst <= 69 && $s3markst >= 65) {
    $s3marks = "B+";
  } elseif ($s3markst <= 64 && $s3markst >= 60) {
    $s3marks = "B";
  } elseif ($s3markst <= 59 && $s3markst >= 55) {
    $s3marks = "B-";
  } elseif ($s3markst <= 54 && $s3markst >= 50) {
    $s3marks = "C+";
  } elseif ($s3markst <= 49 && $s3markst >= 45) {
    $s3marks = "C";
  } elseif ($s3markst <= 44 && $s3markst >= 40) {
    $s3marks = "C-";
  } elseif ($s3markst <= 39 && $s3markst >= 35) {
    $s3marks = "D+";
  } elseif ($s3markst <= 34 && $s3markst >= 30) {
    $s3marks = "D";
  } else {
    $s3marks = "F";
  };


  if ($s4markst <= 100 && $s4markst >= 80) {
    $s4marks = "A";
  } elseif ($s4markst <= 79 && $s4markst >= 70) {
    $s4marks = "A-";
  } elseif ($s4markst <= 69 && $s4markst >= 65) {
    $s4marks = "B+";
  } elseif ($s4markst <= 64 && $s4markst >= 60) {
    $s4marks = "B";
  } elseif ($s4markst <= 59 && $s4markst >= 55) {
    $s4marks = "B-";
  } elseif ($s4markst <= 54 && $s4markst >= 50) {
    $s4marks = "C+";
  } elseif ($s4markst <= 49 && $s4markst >= 45) {
    $s4marks = "C";
  } elseif ($s4markst <= 44 && $s4markst >= 40) {
    $s4marks = "C-";
  } elseif ($s4markst <= 39 && $s4markst >= 35) {
    $s4marks = "D+";
  } elseif ($s4markst <= 34 && $s4markst >= 30) {
    $s4marks = "D";
  } else {
    $s4marks = "F";
  };


  if ($s5markst <= 100 && $s5markst >= 80) {
    $s5marks = "A";
  } elseif ($s5markst <= 79 && $s5markst >= 70) {
    $s5marks = "A-";
  } elseif ($s5markst <= 69 && $s5markst >= 65) {
    $s5marks = "B+";
  } elseif ($s5markst <= 64 && $s5markst >= 60) {
    $s5marks = "B";
  } elseif ($s5markst <= 59 && $s5markst >= 55) {
    $s5marks = "B-";
  } elseif ($s5markst <= 54 && $s5markst >= 50) {
    $s5marks = "C+";
  } elseif ($s5markst <= 49 && $s5markst >= 45) {
    $s5marks = "C";
  } elseif ($s5markst <= 44 && $s5markst >= 40) {
    $s5marks = "C-";
  } elseif ($s5markst <= 39 && $s5markst >= 35) {
    $s5marks = "D+";
  } elseif ($s5markst <= 34 && $s5markst >= 30) {
    $s5marks = "D";
  } else {
    $s5marks = "F";
  };

  $gpa_query_s1 = "SELECT * FROM gpa where grade_points='{$s1marks}'";               // GPA
  $gpa_s1 = mysqli_query($mysqli, $gpa_query_s1);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s1)) {
    $gvs1 = $row['grade_value'];
  }

  $gpa_query_s2 = "SELECT * FROM gpa where grade_points='{$s2marks}'";               // GPA 2
  $gpa_s2 = mysqli_query($mysqli, $gpa_query_s2);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s2)) {
    $gvs2 = $row['grade_value'];
  }

  $gpa_query_s3 = "SELECT * FROM gpa where grade_points='{$s3marks}'";               // GPA
  $gpa_s3 = mysqli_query($mysqli, $gpa_query_s3);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s3)) {
    $gvs3 = $row['grade_value'];
  }

  $gpa_query_s4 = "SELECT * FROM gpa where grade_points='{$s4marks}'";               // GPA
  $gpa_s4 = mysqli_query($mysqli, $gpa_query_s4);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s4)) {
    $gvs4 = $row['grade_value'];
  }


  $gpa_query_s5 = "SELECT * FROM gpa where grade_points='{$s5marks}'";               // GPA
  $gpa_s5 = mysqli_query($mysqli, $gpa_query_s5);    // sending the query to the database

  //  displaying all the data retrieved from the database using while loop
  while ($row = mysqli_fetch_assoc($gpa_s5)) {
    $gvs5 = $row['grade_value'];
  }

  $tot_credits = $scdMaths + $scdDBSM + $scdDWeb + $scdEthics + $scdOs;
  $gpa =  (($gvs1 * $scdMaths) + ($gvs2 * $scdDBSM) + ($gvs3 * $scdDWeb) + ($gvs4 * $scdEthics) + ($gvs5 * $scdOs)) / $tot_credits;
  // $gpa = $util->testInput($_POST['gpa']);


  if ($db->update($id, $index, $name, $s1marks, $s2marks, $s3marks, $s4marks, $s5marks, $gpa)) {
    echo $util->showMessage('success', 'User updated successfully!');
  } else {
    echo $util->showMessage('danger', 'Something went wrong!');
  }
}

// Handle Delete User Ajax Request
if (isset($_GET['delete'])) {
  $id = $_GET['id'];
  if ($db->delete($id)) {
    echo $util->showMessage('info', 'User deleted successfully!');
  } else {
    echo $util->showMessage('danger', 'Something went wrong!');
  }
}
