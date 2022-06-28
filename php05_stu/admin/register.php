<?php
session_start();
require_once('../funcs.php');
loginCheck();

$title = $_POST['title'];
$content  = $_POST['content'];
$img = '';

// 簡単なバリデーション処理追加。
//タイトルとコメントが空白の場合
//trimは前後の空白を取れる
//preg_replace("/( |　)/", "", $string )で全角対応
if(preg_replace("/( |　)/", "", $title)=== '' || preg_replace("/( |　)/", "", $content)===''){
    redirect('post.php?error=1');
    //[?hogehoge]で？以降の物をgetで取得できる
};

//imgがある場合
if ($_SESSION['post']['image_data']) {
    // 名前を一意にするため時間を加えている。
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
}

if ($_SESSION['post']['image_data']) {
    file_put_contents('../images/' . $img, $_SESSION['post']['image_data']);
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_content_table(
                            title, content, img, date
                        )VALUES(
                            :title, :content, :img, sysdate()
                        )');
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('index.php');
}
