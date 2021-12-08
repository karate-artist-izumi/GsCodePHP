<?php 
//セッションスタート
session_start();

//ログインチェック
//前のページでログインしたIDとセッションIDが同じならば実行
if($_SESSION["ssid"] == session_id()){
    //セッションIDをページ遷移した時に再度作ってssidに挿入
    session_regenerate_id(true);
    $_SESSION["ssid"] = session_id();
}else{
exit("ログインエラー");
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=$_SESSION["name"]?>
    <a href="logout.php"><button>ログアウト</button></a>
    <form method="post" action="log_create.php">
        名前　：<input type="text" name="name"><br>
        EMAIL：<input type="text" name="email"><br>
        内容　：<textarea name="text" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="送信">
    </form>

    <br>
    <a href="log_read.php">一覧表示</a>

</body>
</html>