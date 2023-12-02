<?php
include 'inc/connect.php';
include 'inc/security.php';

$cat_id = $_GET['cat_id'];

$sql = "DELETE  FROM category WHERE cat_id = $cat_id";

if(mysqli_query($conn,$sql)){
    $sql = "DELETE FROM sub_category WHERE cat_id = '$cat_id'";
    if(mysqli_query($conn,$sql)){
        $sql = "DELETE FROM product_master WHERE product_category = '$cat_id'";
        mysqli_query($conn,$sql);
    }
}else{
    $msg = "Could not delete category";
}
header("Location:product_category.php?msg=$msg");