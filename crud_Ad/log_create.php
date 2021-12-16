<?php
//セッションスタート
session_start();

//関数読み込み
include("function.php");

//値の受け取り
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];

//ログインチェック
sschk();

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
//実行してstatusに結果を挿入
$status = $stmt->execute();

//statusがエラーだったらここで処理を止める
if($status==false){
    //errorにstmtのエラー情報を挿入
    $error = $stmt->errorInfo();
    exit("SQLエラー".$error[2]);
}

//入力画面に戻す
// header("Location: index.php");
jump("log_index.php");
exit();

?>