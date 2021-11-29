<?php

include("funcs.php");

$name = $_POST["name"];
$sex = $_POST["sex"];
$tel = $_POST["tel"];
$email = $_POST["email"];

$c = ",";
$str = $name.$c.$sex.$c.$tel.$c.$email;

$file = fopen("data/memo.txt","a");
fwrite($file, $str."\n");
fclose($file);


http_response_code( 301 ) ;

header( "Location: http://localhost/lab10/test/data_input.php" ) ;
exit ;

?>