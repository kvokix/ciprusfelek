<?php
session_start();
require_once "CartClass.php";
require_once "db.php";
$cart=new Cart();
$deleteItem=$cart->remove($_GET['id'],$_GET['size']);
$getQty=$cart->getQuantity();
$_SESSION['quantity']-=$_GET['quantity'];
if($getQty==0){
    header('Location:../client/index.php?program=products.php');
}else{
    header('Location:../client/index.php?program=cart.php');
}
//print_r($_SESSION['cart']);

?>