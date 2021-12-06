<?php 
session_start();
include("funcs.php");

test_funcs();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GsCodePhpコード書く</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>test</h1>
<div class="test_btn">テストボタン</div>
<div class="test">入力待ち</div>
<?=session_id()?>

    

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script>


</script>
</body>
</html>