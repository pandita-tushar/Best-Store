<?php
include 'inc/connect.php';
include 'inc/security.php';


if (isset($_POST['submitt'])) {
    $user_id = $_SESSION['userID'];
    $pid = $_POST['pid'];
    $sql = "INSERT INTO cart (user_id, product_id, product_qty) VALUES ('$user_id', '$pid','1')";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    } else {
        mysqli_close($conn);
    }
    $gpid = $_GET['pid'];
    $pcat_id = $_GET['pcat_id'];
    header("location:quick-view.php?pid=$gpid&pcat_id=$pcat_id");
    exit();
}

if (isset($_POST['submit'])) {

    if (!isset($_SESSION['userName'])) {
        $msg = "You need to login first";
        $url = "log-in.php?msg=$msg";
        gotopage($url);
    } else {

        $user_id = $_SESSION['userID'];
        $pid = $_POST['pid'];
        $sql = "INSERT INTO cart (user_id, product_id, product_qty) VALUES ('$user_id', '$pid','1')";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
        } else {
            mysqli_close($conn);
        }
        header("location:index.php");
        exit();
    }
}

if (isset($_POST['submit-c'])) {
    if (!isset($_SESSION['userID'])) {
        header("location:log-in.php");
    } else {
        $user_id = $_SESSION['userID'];
        $product_id = $_GET['pid'];
        $product_qty = $_POST['qty'];
        $sql = "INSERT INTO cart(user_id, product_id, product_qty) VALUES('$user_id', '$product_id','$product_qty')";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
        } else {
            mysqli_close($conn);
        }
        $pid = $_GET['pid'];
        $pcat_id = $_GET['pcat_id'];
        header("location:quick-view.php?pid=$pid&pcat_id=$pcat_id");
        exit();
    }
}

if (isset($_POST['buy-now'])) {
    $pid = $_GET['pid'];
    if (!isset($_SESSION['userID'])) {
        $msg = "You will have to login first";
        $url = "log-in.php?msg=$msg";
        gotopage($url);
    } else {
        $url = "checkout.php?pid=$pid";
        gotopage($url);
    }
}

if (isset($_POST['submit-tb'])) {
    $pid = $_GET['pid'];
    if (!isset($_SESSION['userID'])) {
        $msg = "You will have to login first";
        $url = "log-in.php?msg=$msg";
        gotopage($url);
    } else {
        $user_id = $_SESSION['userID'];
        $pid = $_GET['pid'];

        $sql = "INSERT INTO cart (user_id, product_id, product_qty) VALUES ('$user_id', '$pid','1')";
        if (mysqli_query($conn, $sql)) {
            // mysqli_close($conn);
        }
        $query = "select * from product_master where  $pid = '$pid'";
        $rs = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($rs);
        $pcat_id = $row['product_brand'];
        header("location:brand-wise-products.php?brand_id=$pcat_id");
    }
}
