<?php
session_start();
require_once "CartClass.php";
require_once "db.php";
$cart=new Cart();
$updateItem=$cart->updateQuantity($_GET['id'],$_GET['quantity'],$_GET['size']);
$qty=$cart->getQuantity();
$_SESSION['quantity']=$qty;
echo $qty;

//header('location:../client/index.php?program=cart.php');
?>