<?php
function h($val){
    return htmlspecialchars($val, ENT_QUOTES);
}

$name = $_POST["name"];
$email = $_POST["email"];

var_dump($name);
// exit();

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