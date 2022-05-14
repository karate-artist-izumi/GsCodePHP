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
            <li>組み込み関数を知る</li>
            <li>if文と文と関数を組み合わせておみくじを作る</li>
            <li>(演習)自由におみくじをアレンジする</li>
            <li><a href="index.php">index.php</a></li>
        </ul>
    </div>
    <!-- ここから -->
    <?php 
    
    //日付関数
    //Y,Hは大文字
    $date = date('Y/m/d H:i');
    echo $date;
    echo '<br>';

    $str = 'abcde';
    $len = strlen($str);
    echo $str.'の文字数は'.$len;
    echo '<br>';

    $rand = rand(1,3);
    echo $rand;
    echo '<br>';

    if($rand === 1){
        echo '大吉';
    } elseif($rand === 2){
        echo '吉';
    } else {
        echo 'きょう';

    }

    ?>
    <!-- ここまで -->
</body>

</html>
