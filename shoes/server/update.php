<?php
    require_once 'db.php';
    extract($_GET);
    $sql="update products set title='{$title}', category='{$category}', price={$price}, brand='{$brand}' where id={$id} ";
    $stmt=$db->exec($sql);
    if($stmt){
        echo "sikeres módosítás";
    }else{
        echo "nem sikerült az adat módosítás!";
    }
?>