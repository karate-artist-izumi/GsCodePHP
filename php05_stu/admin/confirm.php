<?php
session_start();
require_once('../funcs.php');
loginCheck();

// post受け取る
// $title = $_POST['title'];
// $content = $_POST['content'];

//sessionに値を残す
// $_SESSION['post']['title']←に値が入る？
//postで値を貰った→セッションにも値を入れて→変数に格納する
$title = $_SESSION['post']['title'] = $_POST['title'];
$content = $_SESSION['post']['content'] = $_POST['content'];


// 簡単なバリデーション処理追加。
//タイトルとコメントが空白の場合
//preg_replace("/( |　)/", "", $string )で全角対応
if(preg_replace("/( |　)/", "", $title)=== '' || preg_replace("/( |　)/", "", $content)===''){
    redirect('post.php?error=1');
    //[?hogehoge]で？以降の物をgetで取得できる
};


// imgある場合
// var_dump($_FILES);
//imgのなかにnameがあれば名前保存→データ保存→拡張子保存
if($_FILES['img']['name']){
    //ファイルのnameをセッションに保存
    $file_name = $_SESSION['post']['file_name'] = $_FILES['img']['name'];
    // 一時保存されているファイル内容を取得して、セッションに格納
    $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);
    // 一時保存されているファイルの種類を確認して、セッションにその種類に当てはまる特定のintを格納
    $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);

}else{
    //データが無い場合は空白を収納
    $image_data = $_SESSION['post']['image_data'] = '';
    $image_type = $_SESSION['post']['image_type'] = '';
    
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>記事管理</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">ブログ画面へ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- errorを受け取ったら、エラー文出力。 -->

    <form method="POST" action="register.php" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="hidden"name="title" value="<?= $title ?>">
            <p><?= $title ?></p>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">記事内容</label>
            <input type="hidden"name="content" value="<?= $content ?>">
            <div><?= nl2br($content) ?></div>
        </div>

        <!-- 画像の確認 -->
        <?php if($image_data): ?>
            <div class="mb-3">
                <img src="image.php">
            </div>
        <?php endif ?>

        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <a href="post.php?re-register=true">前の画面に戻る</a>
</body>
</html>
