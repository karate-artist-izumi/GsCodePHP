<?php

//値の受け取り
$name = $_POST["name"];
$login_id = $_POST["login_id"];
$login_pass = $_POST["login_pass"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

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

//SQL文
$sql = 'INSERT INTO test_user_table(name, login_id, login_pass, kanri_flg, life_flg, datetime)VALUES(:name, :login_id, :login_pass, :kanri_flg, :life_flg, sysdate())';
//SQLを実行
$stmt = $pdo->prepare($sql);

//安全な値に変換
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':login_id',$login_id,PDO::PARAM_STR);
$stmt->bindValue(':login_pass',$login_pass,PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg',$kanri_flg,PDO::PARAM_INT);
$stmt->bindValue(':life_flg',$life_flg,PDO::PARAM_INT);

//sqlを実行
$stmt->execute();

//入力画面に戻す
header("Location: login.php");
exit();

?>