<?php
include 'inc/connect.php';
include 'inc/security.php';

$pid = $_GET['pid'];
$sts = $_GET['sts'];

$sql = "UPDATE product_master SET p_status = '$sts'  WHERE pid = $pid";

if(mysqli_query($conn,$sql)){
    $msg = "Status Updated Successfully";
}else{
    $msg = "Sorry, there was some problem";
}
header("Location:product_manage.php?msg=$msg");