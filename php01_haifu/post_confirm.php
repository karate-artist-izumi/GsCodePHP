<?php 
// POSTを受け取る
// POSTの場合はパスワードも送ってみる。

$namae = $_POST['namae'];
$email = $_POST['email'];


?>
<html>

<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>
    お名前：<?= $namae?>
    EMAIL：
    パスワード：
    <ul>
        <li><a href="index.php">index.php</a></li>
    </ul>
</body>

</html>
