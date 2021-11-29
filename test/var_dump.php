<?php

$arry = ["a","b","c"];
$arry[] = "d";
$arry[] = "e";
// var_dump($arry);

$str = "yamada suzuki sasaki";
$che = str_replace("suzuki", "izumi", $str);
// echo $che;

$s = "A,B,C,D,E";
$e = explode(",",$s);

$ymdhis = date("Y年m月d日H時i分s秒");

$file = fopen("data/data.txt","a");
fwrite($file, $ymdhis."\r\n");
fclose($file);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?=
var_dump($arry);
echo "<br/>";

echo $che;
echo "<br/>";

var_dump($s);
echo "<br/>";

echo $s;
echo "<br/>";

var_dump($e);
echo "<br/>";

echo $e[0];
echo "<br/>";

echo $ymdhis;
echo "<br/>";

?>
日時ファイル書き込み完了

    
</body>
</html>