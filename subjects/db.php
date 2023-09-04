<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($s_id, $s_name, $s_details, $s_credit) {
      $sql = 'INSERT INTO subjects (s_id, s_name, s_details, s_credit) VALUES (:s_id, :s_name, :s_details, :s_credit)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        's_id' => $s_id,
        's_name' => $s_name,
        's_details' => $s_details,
        's_credit' => $s_credit
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM subjects ORDER BY s_id ASC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM subjects WHERE s_id = :s_id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['s_id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($s_id, $s_name, $s_details, $s_credit ) {
      $sql = 'UPDATE subjects SET s_id = :s_id, s_name = :s_name, s_details = :s_details, s_credit = :s_credit WHERE s_id = :s_id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        's_id' => $s_id,
        's_name' => $s_name,
        's_details' => $s_details,
        's_credit' => $s_credit
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($s_id) {
      $sql = 'DELETE FROM subjects WHERE s_id = :s_id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['s_id' => $s_id]);
      return true;
    }
  }

?>