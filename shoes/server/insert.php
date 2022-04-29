<?php
    require_once "db.php";
    extract($_GET);
    $sql="insert into products values (null,'{$title}','{$category}','{$price}','{$brand}')";
    $stmt=$db->exec($sql);
    echo $stmt;
?>