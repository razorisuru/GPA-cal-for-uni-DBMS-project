<?php session_start(); ?>
<?php

require_once 'db.php';
require_once 'util.php';

$db = new Database;
$util = new Util;

// Handle Add New User Ajax Request
if (isset($_POST['add'])) {
  $s_id = $util->testInput($_POST['s_id']);
  $s_name = $util->testInput($_POST['s_name']);
  $s_details = $util->testInput($_POST['s_details']);
  $s_credit = $util->testInput($_POST['s_credit']);
  // if ($rolet == 'super_admin') {
  //   $role = "super_admin";
  // } else if ($rolet == 'admin') {
  //   $role = "admin";
  // } else {
  //   $role = "user";
  // };

  if ($db->insert($s_id, $s_name, $s_details, $s_credit)) {
    echo $util->showMessage('success', 'User inserted successfully!');
  } else {
    echo $util->showMessage('danger', 'Something went wrong!');
  }
}

// Handle Fetch All Users Ajax Request S_ADMIN
if ($_SESSION['role'] == 'super_admin') {
  if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
      foreach ($users as $row) {
        $output .= '<tr>
                        <td>' . $row['s_id'] . '</td>
                        <td>' . $row['s_name'] . '</td>
                        <td>' . $row['s_details'] . '</td>
                        <td>' . $row['s_credit'] . '</td>
                        <td>
                          <a href="#" id="' . $row['s_id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>
  
                          <a href="#" id="' . $row['s_id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                        </td>
                      </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
                <td colspan="5">No Users Found in the Database!</td>
              </tr>';
    }
  }
} else { // Handle Fetch All Users Ajax Request admin
  if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
      foreach ($users as $row) {
        $output .= '<tr>
                      <td>' . $row['s_id'] . '</td>
                      <td>' . $row['s_name'] . '</td>
                      <td>' . $row['s_details'] . '</td>
                      <td>' . $row['s_credit'] . '</td>
                    </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="5">No Users Found in the Database!</td>
            </tr>';
    }
  }
}



// Handle Edit User Ajax Request
if (isset($_GET['edit'])) {
  $s_id = $_GET['id'];

  $user = $db->readOne($s_id);
  echo json_encode($user);
}

// Handle Update User Ajax Request
if (isset($_POST['update'])) {
  $s_id = $util->testInput($_POST['s_id']);
  $s_name = $util->testInput($_POST['s_name']);
  $s_details = $util->testInput($_POST['s_details']);
  $s_credit = $util->testInput($_POST['s_credit']);

  // if ($rolet == 'super_admin') {
  //   $role = "super_admin";
  // } else if ($rolet == 'admin') {
  //   $role = "admin";
  // } else {
  //   $role = "user";
  // };

  if ($db->update($s_id, $s_name, $s_details, $s_credit)) {
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

?>