<?php

  require_once 'db.php';
  require_once 'util.php';

  $db = new Database;
  $util = new Util;

  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $index = $util->testInput($_POST['index']);
    $name = $util->testInput($_POST['name']);
    $email = $util->testInput($_POST['email']);
    $rolet = $util->testInput($_POST['role']);
    if ($rolet == 'super_admin') {
      $role = "super_admin";
    } else if ($rolet == 'admin') {
      $role = "admin";
    } else {
      $role = "user";
    };

    if ($db->insert($index, $name, $email, $role)) {
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
                      <td>' . $row['id'] . '</td>
                      <td>' . $row['index'] . '</td>
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['email'] . '</td>
                      <td>' . $row['role'] . '</td>
                      <td>
                        <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                        <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                      </td>
                    </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="6">No Users Found in the Database!</td>
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
    $email = $util->testInput($_POST['email']);
    $rolet = $util->testInput($_POST['role']);

    if ($rolet == 'super_admin') {
      $role = "super_admin";
    } else if ($rolet == 'admin') {
      $role = "admin";
    } else {
      $role = "user";
    };

    if ($db->update($id, $index, $name, $email, $role)) {
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