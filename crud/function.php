<?php

//HTMLスペシャルキャラーズ
function h($val){
    return htmlspecialchars($val, ENT_QUOTES);
}

//データベース接続設定
function db_conn(){
    try{
        $db_name = 'test_crud';
        $host = 'localhost';
        $host_id = 'root';
        $host_pass = 'root';
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=UTF8;host='.$host.'',''.$host_id.'',''.$host_pass.'');
        // $pdo = new PDO('mysql:dbname=test_crud;charset=UTF8;host=localhost','root','root');
        return $pdo;
    }catch(PDOException $e){
        print("DB接続失敗".$e->getMessage());
    }
}

//エラーだった時の処理
function sql_error($stmt){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト
function jump($link){
    //linkにジャンプ
    return header("Location: ".$link);
}

//ログインチェック
function sschk(){
//ssidに変数がセットされていない
//or(又は)前のページでログインしたIDとセッションIDが同じじゃない時
if(!isset($_SESSION["ssid"]) || $_SESSION["ssid"] != session_id()){
    exit("ログインエラー");
}else{
//セッションIDをページ遷移した時に再度作ってssidに挿入
    session_regenerate_id(true);
    $_SESSION["ssid"] = session_id();
}
}

?>