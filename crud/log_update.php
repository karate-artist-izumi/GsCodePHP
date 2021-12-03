<?php
//関数読み込み
include("function.php");

//値の受け取り
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];
//updateではidを取得
$id = $_POST["id"];

//ログインチェック
sschk();

//データベース接続
$pdo = db_conn();

//SQL文実行
$sql = 'UPDATE test_crud_table SET name=:name, email=:email, text=:text, datetime=sysdate() WHERE id=:id';
$stmt = $pdo->prepare($sql);

//安全な値に変換
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);
$stmt->bindValue(':text',$text,PDO::PARAM_STR);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

//sqlを実行
$stmt->execute();

//入力画面に戻す
// header("Location: index.php");
jump("log_read.php");
exit();

?>