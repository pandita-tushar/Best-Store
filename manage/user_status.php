<?php
include 'inc/connect.php';
include 'inc/security.php';

$uid = $_GET['uid'];
$sts = $_GET['sts'];

$sql = "UPDATE user SET u_status = $sts WHERE uid = $uid";

if(mysqli_query($conn,$sql)){
    $msg = "Status Updated Succesfully ";
}else{
    $msg = "Sorry, there was some error";
}
header("Location:manage_user.php?msg=$msg");