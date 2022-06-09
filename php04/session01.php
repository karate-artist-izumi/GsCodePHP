<?php 
session_start();

$_SESSION["name"]="izumi";
$_SESSION["age"]=39;
$_SESSION["item"]="PHP";

echo session_id();

?>