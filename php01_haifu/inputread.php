<?php
// ファイルを開く
$rfile = fopen('data/dp.txt','r');

// ファイル内容を1行ずつ読み込んで出力
while($str = fgets($rfile)){
    echo nl2br($str);
}

// ファイルを閉じる
fclose($rfile);