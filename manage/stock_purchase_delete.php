<?php
include 'inc/connect.php';
include 'inc/security.php';

$sid = $_GET['sid'];

$sql = "DELETE  FROM stock_purchase WHERE sid = $sid";

if(mysqli_query($conn,$sql)){
    $msg = "Record Deleted Successfully";
}else{
    $msg = "Sorry, there was some problem";
}
header("Location:stock_purchase.php?msg=$msg");