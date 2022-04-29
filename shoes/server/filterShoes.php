<?php
require_once 'db.php';
    extract($_GET);
        $sql="SELECT * FROM `products` where price>='{$min}' AND price<='{$max}' 
        AND lower(title) like '%{$title}%' 
        AND (brand='{$nike}' OR brand='{$adidas}' OR brand='{$fila}' OR brand='{$puma}')
        AND (category='{$b}' OR category='{$m}' OR category='{$g}' OR category='{$w}') order by id;"; 
    $stmt=$db->query($sql);
    echo json_encode($stmt->fetchAll());    
?>