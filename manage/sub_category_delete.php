<?php
include 'inc/connect.php';
include 'inc/security.php';

$sc_id = $_GET['sc_id'];

$sql = "DELETE  FROM sub_category WHERE sc_id = $sc_id";

if(mysqli_query($conn,$sql)){
    $msg = "Sub-Category Deleted Successfully";
}else{
    $msg = "Could not delete Product";
}
header("Location:product_category.php?msg=$msg");