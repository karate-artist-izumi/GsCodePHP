<?php 
session_start();

//セッションを空にする
$_SESSION = array();

//クッキーを無効化
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-42000,'/');
}

session_destroy();

header("Location: login.php");
exit();


?>