<?php
    require_once 'db.php';
    $sql="SELECT * FROM `products` order by id";
    $stmt=$db->query($sql);
    echo json_encode($stmt->fetchAll());
?>