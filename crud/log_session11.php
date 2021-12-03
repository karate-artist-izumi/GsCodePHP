<?php
//セッションの時は必須
session_start();

echo $_SESSION["name"];
echo $_SESSION["age"];
echo $_SESSION["email"];

echo "<br>";
echo session_id();

?>