<?php 
session_start();

include("funcs.php");
// sschk();
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_an_table");

$status = $stmt->execute();

$view = "";

if($status==false){
    sql_error();
}else{
    while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>';
            $view .= '<a href="detail.php?id='.$r["id"].'">';
            $view .= $r["id"]."|".$r["name"]."|".$r["email"];
            $view .= '</a>';
            $view .= "  ";
            // if($_SESSION["kanri_flg"]=="1"){
                $view .= '<a href="delete.php?id='.$r["id"].'">';
                $view .= '[削除]';
                $view .= '</a>';
            // }
        $view .= '</p>';
    }
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
    
    <div>
        <input type="text" id="sch">
        <button id="btn">検索</button>
    </div>

    <div id="view"><?=$view?></div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

$("#btn").on("click",function(){
    const params = new URLSearchParams();
    params.append('sch',$("#sch").val());

    axios.post('select2.php',params).then(function(response){
        if(response.data!=""){
            $("#view").html(response.data);
        }else{
            $("#view").html("null");
        }
    });

});

</script>

</body>
</html>