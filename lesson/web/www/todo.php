<?php
  require_once(__DIR__.'/init.php');
  $user_id = $_GET["user_id"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" type="text/css" href="assets/todo.css">
  
</head>
<body>
  <header>
    <h1>TODO テスト</h1>
  </header>
  <div class="todo-form">
    <h2>TODO登録</h2>
    <form id="form">
      <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
      <input type="hidden" name="status_id" value="1">
      <div>
        <label for="name">タイトル</label>
        <div><input type="text" name="name" id="name" require></div>
      </div>
      <div>
        <label for="date">日付</label>
        <div><input type="date" name="date" id="date" require></div>
      </div>
      <div>
        <label for="description">内容</label>
        <div><textarea name="description" id="description"></textarea></div>
      </div>
      <div class="buttons">
        <button class="btn-hover color-2" type="button" onclick="insertTodo()">この内容で登録する</button>
      </div>
    </form>
  </div>
  <div class="todo-list">
    <h2>TODOリスト</h2>
    <ul id="lists"></ul>
  </div>
  <script src="assets/todo.js"></script>
</body>
</html>