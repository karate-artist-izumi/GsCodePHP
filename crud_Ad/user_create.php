<?php
//関数読み込み
include("function.php");

//値の受け取り
$name = $_POST["name"];
$login_id = $_POST["login_id"];
$login_pass = $_POST["login_pass"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

//パスワードのハッシュ化
$login_pass = password_hash($login_pass, PASSWORD_DEFAULT);

//ログインチェック
// sschk();

//データベース接続
$pdo = db_conn();

//SQL文実行
$sql = 'INSERT INTO test_user_table(name, login_id, login_pass, kanri_flg, life_flg, datetime)VALUES(:name, :login_id, :login_pass, :kanri_flg, :life_flg, sysdate())';
$stmt = $pdo->prepare($sql);

//安全な値に変換
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':login_id',$login_id,PDO::PARAM_STR);
$stmt->bindValue(':login_pass',$login_pass,PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg',$kanri_flg,PDO::PARAM_INT);
$stmt->bindValue(':life_flg',$life_flg,PDO::PARAM_INT);

//sqlを実行
//実行してstatusに結果を挿入
$status = $stmt->execute();

//statusがエラーだったらここで処理を止める
if($status==false){
    //errorにstmtのエラー情報を挿入
    $error = $stmt->errorInfo();
    exit("SQLエラー".$error[2]);
}

//入力画面に戻す
// header("Location: index.php");
jump("login.php");
exit();

?>