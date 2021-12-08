<?php 
//sessionを開始
session_start();

//postで値を受け取って変数用意
$login_id = $_POST["login_id"];
$login_pass = $_POST["login_pass"];

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

//userテーブルを検索するSQL文
$sql = "SELECT * FROM test_user_table WHERE login_id=:login_id AND login_pass=:login_pass AND life_flg=0";
$stmt = $pdo->prepare($sql);
//安全な値に変更
$stmt->bindValue(':login_id',$login_id,PDO::PARAM_STR);
$stmt->bindValue(':login_pass',$login_pass,PDO::PARAM_STR);
//実行
$stmt->execute();

//statusが問題無ければstmtから一行づつデータを取ってくる
$val = $stmt->fetch();

//もしもvalのidにデータが「空」で「無ければ」
if($val["id"] != ""){
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