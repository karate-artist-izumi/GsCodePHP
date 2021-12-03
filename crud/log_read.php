<?php
//関数読み込み
include("function.php");

//セッションスタート
session_start();

//ログインチェック
sschk();
//ssidに変数がセットされていない
//or(又は)前のページでログインしたIDとセッションIDが同じじゃない時
// if(!isset($_SESSION["ssid"]) || $_SESSION["ssid"] != session_id()){
//     exit("ログインエラー");
// }else{
// //セッションIDをページ遷移した時に再度作ってssidに挿入
//     session_regenerate_id(true);
//     $_SESSION["ssid"] = session_id();
// }

//データベース接続
$pdo = db_conn();

//SQL文セット
//$stmtは$pdoを準備する
$stmt = $pdo->prepare('SELECT * FROM test_crud_table');

//SQL文実行
//実行してstatusに結果を挿入
$status = $stmt->execute();

//statusがエラーだったらここで処理を止める
if($status==false){
    //errorにstmtのエラー情報を挿入
    // $error = $stmt->errorInfo();
    // exit("SQLエラー".$error[2]);
    exit("SQLエラー");
}

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
        //管理者だけに見えるようにする
        if($_SESSION["kanri_flg"]==1){
                    //idをgetでURLに添付
            $view .= '<a href="log_change.php?id='.$res["id"].'">';
            $view .= h($res["name"]);
            $view .= '</a>';
            }else{
                $view .= h($res["name"]);
            }
        $view .= '</td>';

        $view .= '<td>';
        if($_SESSION["kanri_flg"]==1){
            $view .= '<a href="log_change.php?id='.$res["id"].'">';
            $view .= h($res["email"]);
            $view .= '</a>';
            }else{
                $view .= h($res["email"]);
            }
        $view .= '</td>';

        $view .= '<td>';
        if($_SESSION["kanri_flg"]==1){
            $view .= '<a href="log_change.php?id='.$res["id"].'">';
            $view .= h($res["text"]);
            $view .= '</a>';
            }else{
                $view .= h($res["text"]);
            }
        $view .= '</td>';

        $view .= '<td>';
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
<a href="http://localhost/GsCodePHP/crud/log_index.php">indexへ戻る</a>
    
</body>
</html>