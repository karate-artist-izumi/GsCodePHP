<?php
//セッションスタート
session_start();

//ログインチェック
if($_SESSION["ssid"] == session_id()){
    //セッションIDをページ遷移した時に再度作ってssidに挿入
    session_regenerate_id(true);
    $_SESSION["ssid"] = session_id();
}else{
exit("ログインエラー");
}

//データベース接続
try{
    $db_name = 'test_crud';
    $host = 'localhost';
    $host_id = 'root';
    $host_pass = 'root';
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=UTF8;host='.$host.'',''.$host_id.'',''.$host_pass.'');
}catch(PDOException $e){
    print("DB接続失敗".$e->getMessage());
}

//SQL文セット
$stmt = $pdo->prepare('SELECT * FROM test_crud_table');

//SQL文実行
$stmt->execute();

//$viewに場所準備
$view = "";

//データループ表示
//$resは$stmtを取ってくる～値の有る間
while($res = $stmt->fetch(PDO::FETCH_ASSOC)){

    //$viewに$resの値を入れる
    $view .= '<tr>';
        $view .= '<td>';
            $view .= $res["id"];
        $view .= '</td>';

        $view .= '<td>';
            //idをgetでURLに添付
            $view .= '<a href="log_change.php?id='.$res["id"].'">';
            $view .= $res["name"];
            $view .= '</a>';
        $view .= '</td>';

        $view .= '<td>';
            $view .= '<a href="log_change.php?id='.$res["id"].'">';
            $view .= $res["email"];
            $view .= '</a>';
        $view .= '</td>';
        
        $view .= '<td>';
            $view .= '<a href="log_change.php?id='.$res["id"].'">';
            $view .= $res["text"];
            $view .= '</a>';
        $view .= '</td>';

        $view .= '<td>';
        //管理者だけに見えるようにする
        if($_SESSION["kanri_flg"]==1){
            //削除リンク
            $view .= '<a href="log_delete.php?id='.$res["id"].'">';
            $view .= '<button>削除</button>';
            $view .= '</a>';
            $view .= '</td>';
        }
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
    <?=$_SESSION["name"]?>
    <a href="logout.php"><button>ログアウト</button></a>
    <br>一覧表示
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
<a href="log_index.php">データ登録</a>
    
</body>
</html>