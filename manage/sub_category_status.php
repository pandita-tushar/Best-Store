<?php
include 'inc/connect.php';
include 'inc/security.php';

$sc_id = $_GET['sc_id'];
$sts = $_GET['sts'];
$cat_id = $_GET['cat_id'];

$sql = "UPDATE  sub_category SET s_status = '$sts' WHERE sc_id = $sc_id";

if(mysqli_query($conn,$sql)){
    $sql = "UPDATE product_master SET p_status = '$sts' WHERE product_sub_category = '$sc_id' ";
    mysqli_query($conn,$sql);
    $msg = "Status Updated Successfully";
}else{
    $msg = "Sorry, there was some problem";
}
header("Location:sub_category.php?msg=$msg&cat_id=$cat_id");