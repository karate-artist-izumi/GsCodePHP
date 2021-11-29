<?php
include("funcs.php");

$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];

// 1.データベースに接続する。
$pdo = db_conn();

// 2.実行したいSQL文をセットする。
$stmt = $pdo->prepare('INSERT INTO test_db_table(name, email, naiyou, datetime)VALUES(:name, :email, :naiyou, sysdate())');

// 3.SQLに対してパラメーターをセットする。【任意】
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);

// 4.実際にSQLを実行する。
$stmt->execute();

header( "Location: http://localhost/lab10/test/db_index.php" ) ;
exit ;

?>