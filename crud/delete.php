<?php
//URLでid指定した値を$idにgetで挿入
$id = $_GET["id"];

//関数読み込み
include("function.php");

//データベース接続
$pdo = db_conn();

//SQL文セット
//$stmtはidを探してその$pdoを準備する
$stmt = $pdo->prepare('DELETE FROM test_crud_table WHERE id=:id');
$stmt->bindValue(":id",$id,PDO::PARAM_INT);

//$stmtを実行する
$stmt->execute();

//一覧表示に戻る
jump("read.php");
exit();

?>