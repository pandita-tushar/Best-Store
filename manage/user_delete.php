<?php
include 'inc/connect.php';
include 'inc/security.php';

$uid = $_GET['uid'];

$sql = "DELETE  FROM user WHERE uid = $uid";

if(mysqli_query($conn,$sql)){
    $msg = "Information Deleted Succesfully ";
}else{
    $msg = "Could not delete information";
}
header("Location:manage_user.php?msg=$msg");