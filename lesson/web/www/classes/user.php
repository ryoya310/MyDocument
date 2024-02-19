<?php
  require_once('dataview.php');

  class User extends DataView
  {
    public function selectPage()
    {
      if ($this->id !== null) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      }
      else
      {
        $stmt = $this->pdo->prepare("SELECT * FROM user");
      }
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($data !== FALSE)
      {
        $this->row = $data;
      }
      return ($data !== FALSE);
    }
  }
?>