<?php
include 'inc/connect.php';
include 'inc/security.php';

$cid = $_GET['cid'];
$sql = "DELETE  FROM cart WHERE cid = $cid";
mysqli_query($conn,$sql);
header("Location:cart.php");

?>