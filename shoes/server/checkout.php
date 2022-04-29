<?php
session_start();
//print_r($_SESSION);
if (!empty($_SESSION['cart'])) {
 echo json_encode($_SESSION['cart']);
    }
   


?>