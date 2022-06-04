<?php 
require_once('funcs.php');
$id = $_GET["id"];

$pdo = db_conn();

$stmt = $pdo->prepare('DELETE FROM gs_an_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    echo('エラー');
}else{
    redirect('select.php');
}


?>