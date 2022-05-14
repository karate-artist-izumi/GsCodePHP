<?php
// GETで送られてきた名前とアドレスのデータを受け取る
var_dump($_GET);
echo '<br>';
var_dump($_GET['namae']);
echo '<br>';
echo $_GET['email'];

$namae = $_GET['namae'];
$email = $_GET['email'];



// (演習)名前、アドレス以外の情報を追加して送ってみましょう（性別、年齢などなど）
?>
<html>

<head>
    <meta charset="utf-8">
    <title>GET練習（受信）</title>
</head>

<body>
    <p>お名前： <?= $namae ?></p>
    <p>Mail： <?= $email ?></p>
    <ul>
        <li><a href="index.php">index.php</a></li>
    </ul>
</body>

</html>
