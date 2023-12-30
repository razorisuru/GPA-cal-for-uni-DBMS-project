<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($index, $name, $email, $role) {
      $sql = 'INSERT INTO user_details (`index`, name, email, role) VALUES (:index, :name, :email, :role)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'index' => $index,
        'name' => $name,
        'email' => $email,
        'role' => $role
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM user_details WHERE id >= 2 ORDER BY id ASC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM user_details WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $index, $name, $email, $role) {
      $sql = 'UPDATE user_details SET `index` = :index, name = :name, email = :email, role = :role WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'index' => $index,
        'name' => $name,
        'email' => $email,
        'role' => $role,
        'id' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = 'DELETE FROM user_details WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
  }

?>