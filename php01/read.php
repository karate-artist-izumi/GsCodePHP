<?php
require_once("funcs.php");
error();

$file = fopen("data/text.txt","r");

// $read = fread($file,1250);
// var_dump($read);

// $r = explode("," , $read);
// echo "<pre>";
// var_dump($r);
// echo "</pre>";

// $r2 = explode("¥n" , $read);
// echo "<pre>";
// var_dump($r2);
// echo "</pre>";

// ファイル内容を1行ずつ読み込んで出力
while ($str = fgets($file)) {
    echo nl2br($str); // nl2br() ... 改行文字を追加
    // var_dump($str);
}


fclose($file);
?>