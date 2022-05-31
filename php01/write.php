<?php
$name = $_POST['name'];
$age = $_POST['age'];
$mail = $_POST['mail'];

$c = ',';

//文字作成
$str = date("Y-m-d H:i:s");
$text = $str.$c.$name.$c.$age.$c.$mail;

//File書き込み
$file = fopen("data/text.txt","a");	// ファイル読み込み
fwrite($file, $text."\n");
fclose($file);


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
<li><a href="input.php">戻る</a></li>
</ul>
</body>
</html>