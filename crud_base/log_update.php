<?php
//値の受け取り
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];
//updateではidを取得
$id = $_POST["id"];

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

//SQL文実行
$sql = 'UPDATE test_crud_table SET name=:name, email=:email, text=:text, datetime=sysdate() WHERE id=:id';
$stmt = $pdo->prepare($sql);

//安全な値に変換
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);
$stmt->bindValue(':text',$text,PDO::PARAM_STR);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

//sqlを実行
$stmt->execute();

//一覧画面に戻す
header("Location: log_read.php");
exit();

?>