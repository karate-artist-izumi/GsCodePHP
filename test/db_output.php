<?php
include("funcs.php");

// 1.データベースに接続する。
$pdo = db_conn();

// 2.実行したいSQL文をセットする。
$stmt = $pdo->prepare('SELECT * FROM test_db_table');

// 3.実際にSQLを実行する。
$stmt->execute();

// 4.データ分ループ表示
$view = "";
while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $view .= '<tr>';
        $view .= '<td class="koumoku">';
        $view .= h($res["id"]);
        $view .= '</td>';

        $view .= '<td class="koumoku">';
        $view .= h($res["name"]);
        $view .= '</td>';

        $view .= '<td class="koumoku">';
        $view .= h($res["email"]);
        $view .= '</td>';

        $view .= '<td class="koumoku">';
        $view .= h($res["naiyou"]);
        $view .= '</td>';
    $view .= '</tr>';

}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    一覧表示

    <table border="1">
    <tr>
        <th class="obi">id</th>
        <th class="obi">名前</th>
        <th class="obi">EMAIL</th>
        <th class="obi">内容</th>
    </tr>

    <?=$view?>

</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>