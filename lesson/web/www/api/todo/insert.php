<?php
  require_once(__DIR__.'/../init.php');

  header('Content-type: application/json; charset=utf-8');

  $ret = array(
		'result' => false,
    'message' => '追加に失敗しました'
	);

  $todo = new Todo($pdo);
  $todo->name = $_POST['name'];
  $todo->date = $_POST['date'];
  $todo->description = $_POST['description'];
  $todo->user_id = $_POST['user_id'];
  $todo->status_id = $_POST['status_id'];
  $todo->updated_by = 'system';
  $response = $todo->insertCommand();

  echo json_encode($response);
?>