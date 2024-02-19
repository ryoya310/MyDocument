<?php
  require_once(__DIR__.'/../init.php');

  header('Content-type: application/json; charset=utf-8');

  $response = array();
  $data = array();

  $todo = new Todo($pdo);
  $todo->user_id = $_GET['user_id'];
  $todo->selectPage();

  foreach ($todo->row as $key => $item) {

    $formatDate = str_replace('-', '/', $item['date']); 
    $list  = sprintf('<li>');
    $list .= sprintf('<div class="item">');
    $list .= sprintf('<div>日付: %s</div>', $formatDate);
    $list .= sprintf('<div>タイトル: %s</div>', $item['name']);
    $list .= sprintf('<div>内容: %s</div>', nl2br($item['description']));
    $list .= sprintf('</div>');
    $list .= sprintf('<div class="action">');
    // $list .= sprintf('<button class="update" type="button" onclick="deleteTodo(%s)">編集</button>', $item['id']);
    $list .= sprintf('<button class="delete" type="button" onclick="deleteTodo(%s)">削除</button>', $item['id']);
    $list .= sprintf('</div>');
    $list .= sprintf('</li>');
    $data[] = $list;
  }

  $response = array(
    'list' => $data
  );
  echo json_encode($response);
?>