<?php
include 'inc/connect.php';
include 'inc/security.php';

$cat_id = $_GET['cat_id'];
$sts = $_GET['sts'];

$sql = "UPDATE category SET status = '$sts' WHERE cat_id = $cat_id";

if(mysqli_query($conn,$sql)){
    $sql = "UPDATE sub_category SET s_status = '$sts' WHERE cat_id = $cat_id";
    if(mysqli_query($conn,$sql)){
        $sql = "UPDATE product_master SET p_status = '$sts' WHERE product_category = $cat_id";
        mysqli_query($conn,$sql);
    }
    $msg = "Status Updated Successfully";
}else{
    $msg = "Sorry, there was some problem";
}
header("Location:product_category.php?msg=$msg");