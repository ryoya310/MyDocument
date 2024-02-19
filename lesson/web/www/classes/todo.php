<?php
  require_once('dataview.php');

  class Todo extends DataView
  {
    public function selectPage()
    {
      if ($this->user_id !== null) {
        $stmt = $this->pdo->prepare("SELECT * FROM todo WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
      }
      else
      {
        $stmt = $this->pdo->prepare("SELECT * FROM todo");
      }
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($data !== FALSE)
      {
        $this->row = $data;
      }
      return ($data !== FALSE);
    }

    public function insertCommand()
    {
      $ret = array(
        "result" => false,
        "error" => ""
      );

      $stmt = $this->pdo->prepare("INSERT INTO todo (
        name, date, description, user_id, status_id, updated_at, updated_by
      ) VALUES (
        :name, :date, :description, :user_id, :status_id, NOW(), :updated_by
      )");

      $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
      $stmt->bindParam(':date', $this->date, PDO::PARAM_STR);
      $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
      $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
      $stmt->bindParam(':status_id', $this->status_id, PDO::PARAM_INT);
      $stmt->bindParam(':updated_by', $this->updated_by, PDO::PARAM_STR);

      $ret['result'] = $stmt->execute();
      if (!$ret['result']) {
        $ret['error'] = $stmt->errorInfo();
      }
      return $ret;
    }

    public function deleteCommand()
    {
      $ret = array(
        "result" => false,
        "error" => ""
      );
      $stmt = $this->pdo->prepare("DELETE FROM todo WHERE id = :id");
      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $ret['result'] = $stmt->execute();
      if (!$ret['result']) {
        $ret['error'] = $stmt->errorInfo();
      }
      return $ret;
    }
  }
?>