<html>

<head>
    <meta charset="utf-8">
    <style>
        .menu {
            background-color: #2FA6E9;
        }
    </style>
</head>

<body>
    <div class="menu">
        <h3>menu</h3>
        <ul>
            <li>配列の書き方を確認(出力の仕方も確認)</li>
            <li>var_dumpを使う</li>
            <li>(演習)配列名'loveFoods'で、自分の好きな食べ物3つの配列を作成。echoで、一番好きなものを出力</li>
            <li><a href="index.php">index.php</a></li>
        </ul>
    </div>
    <!-- ↓ここから -->
<?php 

    $array = ['東京','大阪','名古屋'];

    var_dump($array);
    echo '<br>';
    var_dump($array[2]);
    echo '<br>';


    $array[] = '福岡';//配列の追加方法
    var_dump($array);

?>
    <!-- ↑ここまで -->
</body>

</html>
