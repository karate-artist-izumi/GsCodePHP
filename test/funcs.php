<?php

function h($val){
    return htmlspecialchars($val, ENT_QUOTES);
}

function db_conn(){
    try{
        $pdo = new PDO('mysql:dbname=test_db;charset=UTF8;host=localhost', 'root', 'root');
        return $pdo;
        }catch(PDOException $e){
            print("DB接続に失敗".$e->getMessage());
        }
}



?>