<?php
include("funcs.php");

$name = $_GET["name"];
$email = $_GET["email"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
送信元名前：<?php echo h($name); ?>
送信元EMAIL：<?=h($email)?>

</body>
</html>