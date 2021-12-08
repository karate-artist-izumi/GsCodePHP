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
$stmt = $pdo->prepare('DELETE FROM test_crud_table WHERE id=:id');
$stmt->bindValue(":id",$id,PDO::PARAM_INT);

//$stmtを実行する
$stmt->execute();

//一覧表示に戻る
header("Location: log_read.php");
exit();

?>