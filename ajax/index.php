<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
フリーアンケート
<div id="status">入力中</div>

名前：<input type="text" id="name"><br>
EMAIL：<input type="text" id="email"><br>
<textarea id="naiyou" cols="30" rows="10"></textarea><br>
<button id="btn">送信</button>

<br>
<a href="select.php">一覧</a>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

$("#btn").on("click",function(){
    const params = new URLSearchParams();
    params.append('name',$("#name").val());
    params.append('email',$("#email").val());
    params.append('naiyou',$("#naiyou").val());

    axios.post('insert.php',params).then(function(response){
        if(response.data==true){
            $("#status").html("登録完了");
        }else{
            $("#status").html("登録失敗");
        }
    });

});


</script>
</body>
</html>