<?php

//HTMLスペシャルキャラーズ
function h($val){
    return htmlspecialchars($val, ENT_QUOTES);
}

//データベース接続設定
function db_conn(){
    try{
        // $pdo = new PDO('mysql:dbname=**;charset=UTF8;host=**','**','**');
        $pdo = new PDO('mysql:dbname=test_crud;charset=UTF8;host=localhost','root','root');
        return $pdo;
    }catch(PDOException $e){
        print("DB接続失敗".$e->getMessage());
    }
}

//リダイレクト
function jump($link){
    return header("Location: ".$link);
}

?>