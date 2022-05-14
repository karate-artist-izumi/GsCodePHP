<?php

$name = $_POST['name'];
$bp = $_POST['bp'];

//記入時間
$time = date('Y/m/d H:i:s');

//書き込みファイルを開く
$file = fopen('data/dp.txt','a');

// ファイルに書き込み
fwrite($file,$time.$name.$bp."\n");

//ファイルを閉じる
fclose($file);

//文字作成


?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <ul>
        <li><a href="inputread.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>
</body>

</html>
