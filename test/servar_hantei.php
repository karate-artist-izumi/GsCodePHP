<?php 
echo $_SERVER["HTTP_HOST"]

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
    
    
    PHPで表示中のURL情報を取得する：$_SERVER
    6 
    PHPで現在表示しているページのアドレスを取得する方法について説明します。
    
    URLを$_SERVER変数から取得する
    表示中のURLの情報は$_SERVERに格納され、$_SERVERを参照することで様々な情報を取得できることができます。
    
    対象ページが　http://uxmilk.jp/14769　の場合、以下のようになります。
    
    アクセスしているページを取得
    現在アクセスしているページを表示します。
    
    print $_SERVER["REQUEST_URI"];
    //[実行結果] /14769
    1
2
print $_SERVER["REQUEST_URI"];
//[実行結果] /14769
プロトコルがhttpかhttpsであるかの判定
httpかhttpsを判定し、表示します。

if (empty($_SERVER["HTTPS"])) {
    echo "http://";
} else {
  echo "https://";
}
//[実行結果] http://
1
2
3
4
5
6
if (empty($_SERVER["HTTPS"])) {
    echo "http://";
} else {
    echo "https://";
}
//[実行結果] http://
サーバーのホスト名を取得
リクエストのHost:ヘッダの内容（ドメイン名）を表示します。

echo $_SERVER["HTTP_HOST"]
//[実行結果] uxmilk.jp
1
2
echo $_SERVER["HTTP_HOST"]
//[実行結果] uxmilk.jp
表示しているページの完全なURLを表示
現在、表示しているページのURLを全て表示するサンプルです。

以下は、三項演算子を使い1行のコードにしたサンプルコードです。

print((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
1
print((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
わかりやすくif文を使った形にすると以下のようになります。

if (empty($_SERVER["HTTPS"])) {
    echo "http://";
} else {
    echo "https://";
}
echo $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
1
2
3
4
5
6
if (empty($_SERVER["HTTPS"])) {
    echo "http://";
} else {
    echo "https://";
}
echo $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
上記のサンプルでは、URLにポート番号は含んでいないので、ポートを含む場合は$_SERVER["SERVER_PORT"]を利用してください。

$_SERVER['HTTP_HOST']と$_SERVER['SERVER_NAME']の違い
また、$_SERVER変数には、「HTTP_HOST」とよく似た連想配列「SERVER_NAME」があります。これは表示する元となる情報が異なります。

$_SERVER['HTTP_HOST']は、リクエストヘッダーのHost：の内容が保存されています。一方で、$_SERVER['SERVER_NAME']は、apacheやnginxなどで設定されているServerNameとなります。


</body>
</html>