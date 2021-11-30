<?php
include("funcs.php");

$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];

// 1.データベースに接続する。
$pdo = db_conn();

// 2.実行したいSQL文をセットする。
$sql = 'INSERT INTO test_db_table(name, email, naiyou, datetime)VALUES(:name, :email, :naiyou, sysdate())';
$stmt = $pdo->prepare($sql);

// 3.SQLに対して危ない命令を変換
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);

// 4.実際にSQLを実行する。
$stmt->execute();

header("Location: db_index.php");
exit();



// $status = $stmt->execute(); //SQL実行

// //４．データ登録処理後
// if($status==false){
//     //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//     $error = $stmt->errorInfo();
//     exit("SQLError:".$error[2]);
//   }else{
//     //５．index.phpへリダイレクト
//     header("Location: index.php");
//     exit();
//   }


?>