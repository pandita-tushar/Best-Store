<?php
include 'inc/connect.php';
include 'inc/security.php';

$b_id = $_GET['b_id'];
$cat_id = $_GET['cat_id'];

$sql = "DELETE  FROM brand WHERE b_id = $b_id";

if(mysqli_query($conn,$sql)){
    $sql  = "DELETE FROM product_master WHERE product_brand = '$b_id'";
    mysqli_query($conn,$sql);
    $msg = "Brand Deleted Successfully";
}else{
    $msg = "Could not delete category";
}
header("Location:brand.php?msg=$msg&cat_id=$cat_id");