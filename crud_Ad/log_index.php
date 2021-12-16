<?php 
//関数読み込み
include("function.php");

//セッションスタート
session_start();

//ログインチェック
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?=$_SESSION["name"]?>
    <a href="logout.php"><button>ログアウト</button></a>
    <form method="post" action="log_create.php">
        名前 :<input type="text" name="name"><br>
        EMAIL:<input type="text" name="email"><br>
        内容 :<textarea name="text" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="送信">
    </form>

    <br>
    <a href="log_read.php">一覧表示</a>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script>


</script>
</body>
</html>