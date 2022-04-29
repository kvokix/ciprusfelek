<?php
session_start();
require 'db.php';
require 'CartClass.php';
if (!empty($_SESSION['cart']) && isset($_POST['cim'])) {
    extract($_SESSION);
    extract($_POST);
    $sql="update users set cim='{$cim}', telefonszam='{$telefonszam}' where username='{$username}' ;";
    $stmt = $db -> exec($sql);
    $sql="select id from users where username='{$username}';";
    $stmt1 = $db -> query($sql);
    $row=$stmt1 -> fetch();
    $user_id=$row['id'];
    //$id=$db -> lastInsertId();
    $date=date('Y-m-d');
    $sum=0;
    foreach($cart as $keys => $values){
        extract($values);
        $sum+=intval($quantity) * intval($price);
    }
        $sql2 = "insert into orders values(null,{$user_id},{$sum},'{$date}','{$cim}','{$telefonszam}','{$megjegyzes}'); ";
        $stmt2 = $db -> exec($sql2);
        $last_id=$db -> lastInsertId();
        
        $sql="";
        foreach($cart as $keys => $values){
            extract($values);
            $sql .= "insert into order_items values(null,{$last_id},{$id},{$quantity});";
        }
        $stmt3 = $db -> exec($sql);
        
        echo $stmt3;


        unset($_SESSION['cart']);
        unset($_SESSION['quantity']);
        
}

?>
