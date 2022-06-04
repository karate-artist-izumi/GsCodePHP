<?php

/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */
require_once('funcs.php');

$id = $_GET["id"];

//2. DB接続します
//*** function化する！  *****************
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
$view = '';
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();

}




?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>変更画面</legend>
                <label>名前：<input type="text" name="name" value="<?=$result["name"]?>"></label><br>
                <label>Email：<input type="text" name="email" value="<?=$result["email"]?>"></label><br>
                <label>年齢：<input type="text" name="age" value="<?=$result["age"]?>"></label><br>
                <label><textarea name="naiyou" rows="4" cols="40"><?=$result["naiyou"]?></textarea></label><br>
                <input type="hidden" name="id" value="<?=$result["id"]?>">
                <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>
</body>

</html>
