<?php
//URLでid指定した値を$idにgetで挿入
$id = $_GET["id"];

//関数読み込み
include("function.php");

//データベース接続
$pdo = db_conn();

//SQL文セット
//$stmtはidを探してその$pdoを準備する
$stmt = $pdo->prepare('SELECT * FROM test_crud_table WHERE id=:id');
$stmt->bindValue(":id",$id,PDO::PARAM_INT);

//$stmtを実行する
$stmt->execute();

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
</head>
<body>
変更画面
<form method="post" action="update.php">

    <!-- value属性で値を挿入 -->
    名前　：<input type="text" name="name" value="<?=$view['name']?>"><br>
    EMAIL：<input type="text" name="email" value="<?=$view['email']?>"><br>
    内容　：<textarea name="text" cols="30" rows="10"><?=$view['text']?></textarea>
    
    <!-- 今回はidもupdateに送るために隠した状態で値を持つ -->
    <input type="hidden" name="id" value="<?=$id?>">

    <br>
    <input type="submit" value="SEND">
</form>
    
</body>
</html>