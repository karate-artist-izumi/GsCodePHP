<?php 
$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];

include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name,:email,:naiyou,sysdate())");
$stmt->bindValue(':name',$name);
$stmt->bindValue(':email',$email);
$stmt->bindValue(':naiyou',$naiyou);

$status = $stmt->execute();

if($status==false){
    echo "false";
  }else{
    echo "true";
  }

?>