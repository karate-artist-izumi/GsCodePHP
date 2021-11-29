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
        $view .= '<td>';
        $view .= h($res["id"]);
        $view .= '</td>';

        $view .= '<td>';
        $view .= h($res["name"]);
        $view .= '</td>';

        $view .= '<td>';
        $view .= h($res["email"]);
        $view .= '</td>';

        $view .= '<td>';
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
</head>
<body>
    一覧表示

    <table border="1">
    <tr>
        <th class="">ID</th>
        <th class="">名前</th>
        <th class="">EMAIL</th>
        <th class="">内容</th>
    </tr>

    <?=$view?>

</table>

</body>
</html>