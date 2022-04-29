<?php
    require_once 'db.php';
    $sql="SELECT * FROM `products` where id={$_GET['id']};";
    $stmt=$db->query($sql);
    echo json_encode($stmt->fetchAll());
?>