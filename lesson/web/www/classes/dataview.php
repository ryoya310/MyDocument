<?php
  abstract class DataView
  {
    protected $pdo = NULL;

    // コンストラクタ
    function __construct($pdo)
    {
      $this->pdo = $pdo;
      $this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    }
  }
?>