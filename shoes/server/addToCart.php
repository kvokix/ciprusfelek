<?php
session_start();
require_once "productClass.php";
require_once "CartClass.php";
extract($_POST);
$product=new Product($id,$title,$price,1,$image,$size);
$cart=new Cart();
$cart->addToCart((array)$product);
$_SESSION['quantity']=$cart->getQuantity();
echo $cart->getQuantity();
?>