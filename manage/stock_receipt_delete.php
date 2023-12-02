<?php
include 'inc/connect.php';
include 'inc/security.php';

$sr_id = $_GET['sr_id'];
$sid = $_GET['sid'];


$sql = "DELETE  FROM stock_receipts WHERE sr_id = $sr_id";

if(mysqli_query($conn,$sql)){
    
    $msg = "Record Deleted Successfully";
}else{
    $msg = "Sorry, there was some problem";
}
header("Location:stock_purchase.php?msg=$msg");