<?php
$_POST['name'];
$mail = $_POST['mail'];



?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>
お名前：<?= $_POST['name'] ?><br>
EMAIL：<?= $mail ?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>