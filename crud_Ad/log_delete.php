<?php
//セッションスタート
session_start();

//URLでid指定した値を$idにgetで挿入
$id = $_GET["id"];

//関数読み込み
include("function.php");

//ログインチェック
sschk();

//データベース接続
$pdo = db_conn();

//SQL文セット
//$stmtはidを探してその$pdoを準備する
$stmt = $pdo->prepare('DELETE FROM test_crud_table WHERE id=:id');
$stmt->bindValue(":id",$id,PDO::PARAM_INT);

//$stmtを実行する
//実行してstatusに結果を挿入
$status = $stmt->execute();

//statusがエラーだったらここで処理を止める
if($status==false){
    //errorにstmtのエラー情報を挿入
    $error = $stmt->errorInfo();
    exit("SQLエラー".$error[2]);
}
//一覧表示に戻る
jump("log_read.php");
exit();

?>