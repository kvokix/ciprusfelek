<?php
    require_once 'db.php';
    extract($_GET);
    if($category=='C'){
    $sql="SELECT * FROM `products` where category='G' OR category='B';";
    }else{
        $sql="SELECT * FROM `products` where category='{$category}';";  
    }
    $stmt=$db->query($sql);
    echo json_encode($stmt->fetchAll());
?>