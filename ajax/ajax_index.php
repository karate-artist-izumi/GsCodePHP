<?php 




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
    



<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

axios.get('ajax.php').then(function (response) {
        console.log(response.data); //通信OK
    }).catch(function (error) {
        console.log(error); //通信Error
    }).then(function () {
        console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
    });


</script>
</body>
</html>