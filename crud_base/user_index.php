<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="user_create.php">
        名前：<input type="text" name="name"><br>
        ID：<input type="text" name="login_id"><br>
        PASS：<input type="text" name="login_pass"><br>

        <!-- 権限の選択 -->
        一般<input type="radio" name="kanri_flg" value="0">　
        管理者<input type="radio" name="kanri_flg" value="1">
        <!-- ライフフラグの値代入 -->
        <input type="hidden" name="life_flg" value="0">
        
        <br>
        <input type="submit" value="送信">
    </form>

    <br>
    <a href="login.php">ログインページ</a>

</body>
</html>