<?php
  require_once(__DIR__.'/../init.php');

  header('Content-type: application/json; charset=utf-8');

  $ret = array(
		'responseult' => false,
    'message' => '追加に失敗しました'
	);

  $todo = new Todo($pdo);
  $todo->id = $_POST['id'];
  $response = $todo->deleteCommand();

  echo json_encode($response);
?>