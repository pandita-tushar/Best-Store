<?php include 'inc/connect.php';

$u_aid = $_GET['u_aid'];


if($conn->query("DELETE FROM user_address_book WHERE u_aid = '$u_aid'") === true){
    $msg="Address deleted";
    $url = "address-book.php?msg=$msg";
    gotopage($url);
}
