<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($index, $name, $s1marks, $s2marks, $s3marks, $s4marks, $s5marks, $gpa) {
      $sql = 'INSERT INTO st_details (`index`, name, s1_marks, s2_marks, s3_marks, s4_marks, s5_marks, gpa) VALUES (:index, :name, :s1_marks, :s2_marks, :s3_marks, :s4_marks, :s5_marks, :gpa)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'index' => $index,
        'name' => $name,
        's1_marks' => $s1marks,
        's2_marks' => $s2marks,
        's3_marks' => $s3marks,
        's4_marks' => $s4marks,
        's5_marks' => $s5marks,
        'gpa' => $gpa
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM st_details ORDER BY id ASC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM st_details WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $index, $name, $s1marks, $s2marks, $s3marks, $s4marks, $s5marks, $gpa) {
      $sql = 'UPDATE st_details SET `index` = :index, name = :name, s1_marks = :s1_marks, s2_marks = :s2_marks, s3_marks = :s3_marks, s4_marks = :s4_marks, s5_marks = :s5_marks, gpa = :gpa WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'index' => $index,
        'name' => $name,
        's1_marks' => $s1marks,
        's2_marks' => $s2marks,
        's3_marks' => $s3marks,
        's4_marks' => $s4marks,
        's5_marks' => $s5marks,
        'gpa' => $gpa,
        'id' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = 'DELETE FROM st_details WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
  }

?>