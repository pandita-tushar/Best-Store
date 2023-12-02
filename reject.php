<?php include 'inc/connect.php';
include 'inc/security.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>

    <style>
        .center {
            margin: auto;
            margin-left: 28%;
            margin-top: 20px;
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- nav-bar -->
    <?php include 'nav-bar.php' ?>

    <!-- header -->
    <?php include 'header.php' ?>

    <?php
    $oid = $_GET['oid'];
    $query = "SELECT * FROM orders WHERE oid = '$oid'";
    $res = mysqli_fetch_array(mysqli_query($conn, $query));
    $o_status = $res['order_status'];
    if($o_status == 'Delivered'){
        $i = 'Return';
    }else{
        $i= 'Cancel';
    }
    ?>
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Order <?php echo $i; ?></li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->


    <!-- order reject -->
    <?php
    if(isset($_POST['submit'])){
        $reason = $_POST['reason'];
        $sql = "INSERT INTO rejected_orders(r_oid,action,reason,approval) VALUES('$oid', '$i', '$reason', 'Pending')";
        if(mysqli_query($conn, $sql)){
            $msg = "Your reuest to ".strtolower($i)." order has been submitted";
            $url = "order-history.php?msg=$msg";
            gotopage($url);
        }else{
            $msg = "Sorry,  there was some problem proccessing your rquest";
            $url = "order-history.php?msg=$msg";
            gotopage($url);
        }
    }else{
    ?>
    
    <div class="mail animated wow zoomIn" data-wow-delay=".5s">
        <div class="container">
            <h3><?php echo $i; ?> order</h3>
            <!-- <p class="est">Reason you're returning the order</p> -->
            <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
            <div class="center">
                    <form method="post">
                        <textarea type="text" name="reason" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Reason for <?php echo strtolower($i); ?>ing the order</textarea>
                        <input type="submit" name="submit" value="Submit Request">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <!-- //order reject -->


    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->

</body>

</html>