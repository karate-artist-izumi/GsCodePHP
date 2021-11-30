<?php
//関数読み込み
include("function.php");

//値の受け取り
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];

//データベース接続
$pdo = db_conn();

//SQL文実行
$sql = 'INSERT INTO test_crud_table(name,email,text,datetime)VALUES(:name,:email,:text,sysdate())';
$stmt = $pdo->prepare($sql);

//安全な値に変換
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);
$stmt->bindValue(':text',$text,PDO::PARAM_STR);

//sqlを実行
$stmt->execute();

//入力画面に戻す
// header("Location: index.php");
jump("index.php");
exit();

?>