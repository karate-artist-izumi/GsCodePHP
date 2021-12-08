<?php
//URLでid指定した値を$idにgetで挿入
$id = $_GET["id"];

//ログインチェック
if($_SESSION["ssid"] == session_id()){
    //セッションIDをページ遷移した時に再度作ってssidに挿入
    session_regenerate_id(true);
    $_SESSION["ssid"] = session_id();
}else{
exit("ログインエラー");
}

//データベース接続
try{
    $db_name = 'test_crud';
    $host = 'localhost';
    $host_id = 'root';
    $host_pass = 'root';
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=UTF8;host='.$host.'',''.$host_id.'',''.$host_pass.'');
}catch(PDOException $e){
    print("DB接続失敗".$e->getMessage());
}

//SQL文セット
//$stmtはidを探してその$pdoを準備する
$stmt = $pdo->prepare('SELECT * FROM test_crud_table WHERE id=:id');
$stmt->bindValue(":id",$id,PDO::PARAM_INT);

//$stmtを実行する
$stmt->execute();

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
</head>
<body>
変更画面
    <form method="post" action="log_update.php">
        <!-- value属性で値を挿入 -->
        名前 ：<input type="text" name="name" value="<?=$view['name']?>"><br>
        EMAIL：<input type="text" name="email" value="<?=$view['email']?>"><br>
        <!-- テキストエリアだけは値を直接入力 -->
        内容 ：<textarea name="text" cols="30" rows="10"><?=$view['text']?></textarea>
        <!-- 今回はidもupdateに送るために隠した状態で値を持つ -->
        <input type="hidden" name="id" value="<?=$id?>">
        <br>
        <input type="submit" value="UPDATE">
    </form>
    
    <br>
    <a href="log_read.php">一覧表示</a>

</body>
</html>