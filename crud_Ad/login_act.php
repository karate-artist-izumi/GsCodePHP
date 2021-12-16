<?php 
//sessionを開始
session_start();

//postで値を受け取って変数用意
$login_id = $_POST["login_id"];
$login_pass = $_POST["login_pass"];

//データベース接続
include("function.php");
$pdo = db_conn();

//userテーブルを検索するSQL文
// $sql = "SELECT * FROM test_user_table WHERE login_id=:login_id AND login_pass=:login_pass AND life_flg=0";
//パスワードハッシュ化した時はID検索のみ
$sql = "SELECT * FROM test_user_table WHERE login_id=:login_id AND life_flg=0";
//stmtにSQL文の結果を準備
$stmt = $pdo->prepare($sql);
//安全な値に変更
$stmt->bindValue(':login_id',$login_id,PDO::PARAM_STR);
//パスワードハッシュ化した時はpass検索は不要
// $stmt->bindValue(':login_pass',$login_pass,PDO::PARAM_STR);
//実行してstatusに結果を挿入
$status = $stmt->execute();

//statusがエラーだったらここで処理を止める
if($status==false){
    //errorにstmtのエラー情報を挿入
    $error = $stmt->errorInfo();
    exit("SQLエラー".$error[2]);
}

//statusが問題無ければstmtから一行づつデータを取ってくる
$val = $stmt->fetch();

//もしもvalのidにデータが空で無ければ
// if($val["id"] != ""){
//パスワードハッシュ化した時はpassword_verifyで真偽の判定
$pass_status = password_verify($login_pass, $val["login_pass"]);
//trueならifが実行される
if($pass_status == true){

    //sessionIDをセッションでssidに渡す
    $_SESSION["ssid"] = session_id();
    //valの値をセッションで渡す
    $_SESSION["kanri_flg"] = $val["kanri_flg"];
    $_SESSION["name"] = $val["name"];
    //セッションを持ったまま次のページへ
    header("Location: log_read.php");
    exit();
    
//空なら戻る
}else{
    header("Location: login.php");
    exit();
}




?>