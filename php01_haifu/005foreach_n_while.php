<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="menu" style="background-color: #2FA6E9;">
    <h3>menu</h3>
        <ul>
            <li>foreachの使い方をしる</li>
            <li><a href="index.php">index.php</a></li>
        </ul>
    </div>

<?php
    // 配列を作成する
    $lang = ['PHP', 'JS', 'Python', 'Ruby'];

    // foreachで一つ一つ表示する
    foreach ($lang as $val) {
        echo $val."<br>";
    }



    // whle文に触れる。
        // 初期値を決める
        $money = 10000;

        // whileのカッコの中に継続条件を書く
        while ($money >= 0) {
            echo $money."<br>";
            $money = $money - 3350;
        }

?>
</body>

</html>
