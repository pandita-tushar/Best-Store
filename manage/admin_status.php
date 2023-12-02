<?php
include 'inc/connect.php';
include 'inc/security.php';

$aid = $_GET['aid'];
$sts = $_GET['sts'];

$sql = "UPDATE  admin SET status = '$sts' WHERE admin.aid = $aid";

if(mysqli_query($conn,$sql)){
    $msg = "Status updated Succesfully ";
}else{
    $msg = "Sorry, there was some problem";
}
header("Location:manage_admin.php?msg=$msg");