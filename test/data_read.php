<?php
        $file = fopen("data/memo.txt","r");

        $view = "";
        while($str = fgets($file)){
    
            $array = explode(",",$str);
            
            $view .= '<tr>';
                $view .= '<td class="moji">';
                $view .= $array[0];
                $view .= '</td>';

                $view .= '<td class="moji">';
                $view .= $array[1];
                $view .= '</td>';

                $view .= '<td class="moji">';
                $view .= $array[2];
                $view .= '</td>';

                $view .= '<td class="moji">';
                $view .= $array[3];
                $view .= '</td>';
            $view .= '</tr>';
            
        }
        fclose($file);

    ?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<table border="1">
    <tr>
        <th class="name">名前</th>
        <th class="sex">性別</th>
        <th class="tel">TEL</th>
        <th class="email">EMAIL</th>
    </tr>

    <?=$view?>

</table>

<br>
<a href="http://localhost/lab10/test/data_input.php">TOP</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>