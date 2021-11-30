$(".moji").on("click",function(){
    if (confirm('ページ遷移しますか？')) {
        window.location.href = 'http://localhost/lab10/test/data_input.php';
      }
});

$(".koumoku").on("click",function(){
    if (confirm('ページ遷移しますか？')) {
        window.location.href = 'http://localhost/GsCodePHP/test/db_index.php';
      }
});
