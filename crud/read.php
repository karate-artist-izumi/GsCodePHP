<?php
//関数読み込み
include("function.php");

//データベース接続
$pdo = db_conn();

//SQL文セット
//$stmtは$pdoを準備する
$stmt = $pdo->prepare('SELECT * FROM test_crud_table');

//SQL文実行
//$stmtを実行する
$stmt->execute();


//$viewに場所準備
$view = "";

//データループ表示
//$resは$stmtを取ってくる～値の有る間
while($res = $stmt->fetch(PDO::FETCH_ASSOC)){

    //$viewに$resの値を入れる
    $view .= '<tr>';
        $view .= '<td>';
        //h関数で安全な値に変換してから表示
        $view .= h($res["id"]);
        $view .= '</td>';

        $view .= '<td>';
        //idをgetでURLに添付
        $view .= '<a href="change.php?id='.$res["id"].'">';
        $view .= h($res["name"]);
        $view .= '</a>';
        $view .= '</td>';

        $view .= '<td>';
        $view .= '<a href="change.php?id='.$res["id"].'">';
        $view .= h($res["email"]);
        $view .= '</a>';
        $view .= '</td>';

        $view .= '<td>';
        $view .= '<a href="change.php?id='.$res["id"].'">';
        $view .= h($res["text"]);
        $view .= '</a>';
        $view .= '</td>';

        $view .= '<td>';
        $view .= '<a href="delete.php?id='.$res["id"].'">';
        $view .= '<button>削除</button>';
        $view .= '</a>';
        $view .= '</td>';
    $view .= '</tr>';
}


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
一覧表示
<table border="1">
    <tr>
        <th>id</th>
        <th>名前</th>
        <th>EMAIL</th>
        <th>内容</th>
        <th>削除</th>
    </tr>
    
    <?=$view?>
</table>

<br>
<a href="http://localhost/GsCodePHP/crud/index.php">indexへ戻る</a>
    
</body>
</html>