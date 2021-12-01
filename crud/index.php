<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="post" action="create.php">
        名前　：<input type="text" name="name"><br>
        EMAIL：<input type="text" name="email"><br>
        内容　：<textarea name="text" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="送信">
    </form>

    <br>
    <a href="http://localhost/GsCodePHP/crud/read.php">一覧表示</a>

</body>
</html>