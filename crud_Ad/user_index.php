<?php 
//関数読み込み
include("function.php");

//セッションスタート
session_start();

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

    <form method="post" action="user_create.php">
        名前:<input type="text" name="name"><br>
        ID:<input type="text" name="login_id"><br>
        PASS:<input type="text" name="login_pass"><br>
        一般<input type="radio" name="kanri_flg" value="0">　
        管理者<input type="radio" name="kanri_flg" value="1">
        <input type="hidden" name="life_flg" value="0">
        <br>
        <input type="submit" value="送信">
    </form>

    <br>
    <a href="login.php">ログインページ</a>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script>


</script>
</body>
</html>