<?php

//HTMLスペシャルキャラーズ
function h($val){
    return htmlspecialchars($val, ENT_QUOTES);
}

//データベース接続設定
function db_conn(){
    try{
        $db_name = 'test_crud';
        $host = 'localhost';
        $host_id = 'root';
        $host_pass = 'root';
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=UTF8;host='.$host.'',''.$host_id.'',''.$host_pass.'');
        // $pdo = new PDO('mysql:dbname=test_crud;charset=UTF8;host=localhost','root','root');
        return $pdo;
    }catch(PDOException $e){
        print("DB接続失敗".$e->getMessage());
    }
}

//エラーだった時の処理
function sql_error($stmt){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト
function jump($link){
    //linkにジャンプ
    return header("Location: ".$link);
}

//ログインチェック
function sschk(){
//ssidに変数がセットされていない
//or(又は)前のページでログインしたIDとセッションIDが同じじゃない時
if(!isset($_SESSION["ssid"]) || $_SESSION["ssid"] != session_id()){
    exit("ログインエラー");
}else{
//セッションIDをページ遷移した時に再度作ってssidに挿入
    session_regenerate_id(true);
    $_SESSION["ssid"] = session_id();
}
}


//fileUpload("送信名","アップロード先フォルダ");
function fileUpload($fname,$path){
    if (isset($_FILES[$fname] ) && $_FILES[$fname]["error"] ==0 ) {
        //ファイル名取得
        $file_name = $_FILES[$fname]["name"];
        //一時保存場所取得
        $tmp_path  = $_FILES[$fname]["tmp_name"];
        //拡張子取得
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        //ユニークファイル名作成
        $file_name = date("YmdHis").md5(session_id()) . "." . $extension;
        // FileUpload [--Start--]
        $file_dir_path = $path.$file_name;
        if ( is_uploaded_file( $tmp_path ) ) {
            if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
                chmod( $file_dir_path, 0644 );
                return $file_name; //成功時：ファイル名を返す
            } else {
                return 1; //失敗時：ファイル移動に失敗
            }
        }
     }else{
         return 2; //失敗時：ファイル取得エラー
     }
}

?>