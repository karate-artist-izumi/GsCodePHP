<?php
function h($val){
    return htmlspecialchars($val, ENT_QUOTES);
}

function db_conn(){
    try{
        // $pdo = new PDO('mysql:charset=UTF8;dbname=***;host=**', '**', '**');
        $pdo = new PDO('mysql:charset=UTF8;dbname=test_db;host=localhost', 'root', 'root');
        return $pdo;
        }catch(PDOException $e){
            print("DB接続に失敗".$e->getMessage());
        }
}



?>