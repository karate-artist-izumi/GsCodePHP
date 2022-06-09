<?php 

function h($s){
    return htmlspecialchars($s,ENT_QUOTES);
}

//エラー内容の表示
function error(){
    ini_set('display_errors', 'On'); // エラーを表示させるようにしてください
    error_reporting(E_ALL); // 全てのレベルのエラーを表示してください
}

?>