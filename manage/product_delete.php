<?php
include 'inc/connect.php';
include 'inc/security.php';

$pid = $_GET['pid'];

$sql = "DELETE  FROM product_master WHERE pid = $pid";

if(mysqli_query($conn,$sql)){
    $msg = "Product Deleted Successfully";
}else{
    $msg = "Could not delete Product";
}
header("Location:product_manage.php?msg=$msg");