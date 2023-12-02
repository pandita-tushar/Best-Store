<?php
include 'inc/connect.php';
include 'inc/security.php';

$aid = $_GET['aid'];

$sql = "DELETE  FROM admin WHERE admin.aid = $aid";

if(mysqli_query($conn,$sql)){
    $msg = "Information Deleted Succesfully ";
}else{
    $msg = "Could not delete information";
}
header("Location:manage_admin.php?msg=$msg");