<?php 
session_start();

include("funcs.php");
// sschk();
$pdo = db_conn();
$sch = $_POST["sch"];

$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE email LIKE :email");
$stmt->bindValue(":email",'%'.$sch.'%');

$status = $stmt->execute();

if($status==false) {
    sql_error();
    }else{
        while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
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
echo $view;
exit();

?>