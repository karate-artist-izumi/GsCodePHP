<?php
//セッションの時は必須
session_start();

$_SESSION["name"] = "izumi";
$_SESSION["age"] = "38";
$_SESSION["email"] = "test@test.jp";

echo "<br>";
echo session_id();

?>