<?php 
$str = 'php1,php2,php3';

$s = explode(',' , $str);

var_dump($s);

$c = count($s);

var_dump($c);

// while(){
//     var_dump('t');
// }

for($i=0; $i<$c; ++$i){
    echo('<br>');
    echo($s[$i]);
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
    <ui>
        <li></li>
    </ui>
    
    <script>


    </script>
</body>
</html>