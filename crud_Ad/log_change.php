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
$stmt = $pdo->prepare('SELECT * FROM test_crud_table WHERE id=:id');
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

//viewの表示場所を用意
$view = "";

//データループ表示
//$viewに$stmtを1レコード分取ってくる
$view = $stmt->fetch(PDO::FETCH_ASSOC)


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
変更画面
    <form method="post" action="log_update.php">
        <!-- value属性で値を挿入 -->
        名前 :<input type="text" name="name" value="<?=$view['name']?>"><br>
        EMAIL:<input type="text" name="email" value="<?=$view['email']?>"><br>
        <!-- テキストエリアだけは値を直接入力 -->
        内容 :<textarea name="text" cols="30" rows="10"><?=$view['text']?></textarea>
        <!-- 今回はidもupdateに送るために隠した状態で値を持つ -->
        <input type="hidden" name="id" value="<?=$id?>">
        <br>
        <input type="submit" value="UPDATE">
    </form>
    
    <br>
    <a href="log_read.php">一覧表示</a>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script>


</script>
</body>
</html>