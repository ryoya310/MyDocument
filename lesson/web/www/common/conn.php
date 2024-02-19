<?php
  $hostname_conn = DB_HOSTNAME;
	$database_conn = DB_DATEBASE;
	$username_conn = DB_USERNAME;
	$password_conn = DB_PASSWORD;
	$charset = "utf8mb4";
	$dsn = sprintf("mysql:dbname=%s;host=%s;charset=%s", $database_conn, $hostname_conn, $charset);
	try {
		$pdo = new PDO($dsn, $username_conn, $password_conn, array(PDO::ATTR_EMULATE_PREPARES => false));
	} catch (PDOException $e) {
		exit("データベース接続失敗".$e->getMessage());
	}
?>