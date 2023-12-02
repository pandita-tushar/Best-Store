<?php include 'inc/connect.php';
include 'inc/security.php';     ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
    <style>
        .dropdown-s {
            width: 417px;
            height: 35px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- nav-bar -->
    <?php include 'nav-bar.php' ?>

    <!-- header -->
    <?php include 'header.php' ?>

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <!-- check-out -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Check-Out</h3>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">

                <?php
                if (isset($_GET['pid'])) {
                    if (isset($_POST['submit'])) {
                        $uid = $_SESSION['userID'];
                        $pid = $_GET['pid'];
                        $t_id = $_POST['t_id'];
                        $qty = $_POST['qty'];
                        $cost = "SELECT *,CAST(cost AS int) FROM product_master WHERE pid = '$pid'";
                        $result = mysqli_query($conn, $cost);
                        $rows = mysqli_fetch_assoc($result);
                        $tcost = $rows['cost'] * $qty;
                        $address = $_POST['address'];

                        // creating a master id and inserting it in orders
                        $sqla = "INSERT INTO master_order (u_id, address) VALUES('$uid','$address')";
                        if (mysqli_query($conn, $sqla)) {
                            $n_id = mysqli_insert_id($conn);
                            $insert_id = "INSERT INTO orders(master_id) VALUE('$n_id')";
                            mysqli_query($conn, $insert_id);
                            $sql = "UPDATE orders SET uid = '$uid' , pid = '$pid' ,p_qty = '$qty', transaction_id = '$t_id', o_cost = '$tcost' ,order_status=  'Accepted', o_date = now() WHERE master_id = $n_id";
                            if (mysqli_query($conn, $sql)) {
                                $order = "SELECT * FROM orders WHERE uid = $uid AND master_id = '$n_id' ";
                                $rs = mysqli_query($conn, $order);
                                $row = mysqli_fetch_array($rs);
                                $oid = $row['oid'];
                                $sql  = "INSERT INTO payment (o_id,u_id,payment_status,payment_date) VALUES ('$oid','$uid','1',now())";
                                if (mysqli_query($conn, $sql)) {
                                    $sql = "SELECT * FROM orders WHERE master_id = '$n_id'";
                                    $res = mysqli_query($conn, $sql);
                                    $cost = 0;
                                    while ($row = mysqli_fetch_array($res)) {
                                        $cost += $row['o_cost'];
                                    }
                                    $add = "UPDATE master_order SET total_cost = '$cost' WHERE master_oid = '$n_id'";
                                    if (mysqli_query($conn, $add)) {
                                        $query = "SELECT * FROM stock_purchase WHERE pid = $pid";
                                        $rs = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($rs);
                                        // $o_qty = $row['product_qty'];
                                        $new_qty = $row['product_qty'] - $_POST['qty'];

                                        $sql = "UPDATE stock_purchase SET product_qty = '$new_qty'";
                                        mysqli_query($conn, $sql);
                                    }
                                    $url = "order-history.php";
                                    gotopage($url);
                                }
                            }
                        }
                    } else {
                        $uid = $_SESSION['userID'];
                        $sql = "SELECT * FROM user_address_book WHERE u_id = '$uid'";
                        $rs = mysqli_query($conn, $sql);
                ?>

                        <form action="" method="post">
                            <div>
                                <label for="" class="form-label">Transaction ID</label>
                                <input type="text" name="t_id" class="form-control" required=" ">
                            </div>
                            <div>
                                <label for="" class="form-label">Quantity</label><br>
                                <input type="number" name="qty" class="from-control dropdown-s" required=" ">
                            </div>
                            <div>
                                <label for="" class="form-label">Address</label>
                                <select class="dropdown-s" name="address" id="">
                                    <option value="" disabled selected>Select...</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($rs)) {
                                    ?>
                                        <option value="<?php echo $row['u_aid'] ?>"><?php echo $row['state'] . ", " . $row['city'] . ", " . $row['address'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div><br>
                            <div class="col">
                                <button type="submit" name="submit" class="btn btn-success dropdown-s"><strong>Buy Now</strong></button>
                            </div>
                        </form>

                    <?php
                    }
                }
                if (!isset($_GET['pid'])) {
                    if (isset($_POST['submit'])) {
                        $t_id = $_POST['t_id'];
                        $uid = $_GET['uid'];
                        $address = $_POST['address'];
                        $sqla = "INSERT INTO master_order (u_id,address) VALUES('$uid','$address')";
                        if (mysqli_query($conn, $sqla)) {
                            $n_id = mysqli_insert_id($conn);
                            $cart = "SELECT *,CAST(product_qty AS int) FROM cart WHERE user_id = '$uid'";
                            $res = mysqli_query($conn, $cart);
                            while ($ids = mysqli_fetch_array($res)) {
                                $pid = $ids['product_id'];
                                $qty = $ids['product_qty'];
                                $cost = "SELECT *,CAST(cost AS int) FROM product_master WHERE pid = '$pid'";
                                $result = mysqli_query($conn, $cost);
                                $rows = mysqli_fetch_array($result);
                                $tcost = $rows['cost'] * $ids['product_qty'];

                                $stock = "SELECT * FROM stock_purchase WHERE pid = $pid";
                                $s_rs = mysqli_query($conn, $stock);
                                $s_rows = mysqli_fetch_array($s_rs);
                                $new_qty =  $s_rows['product_qty'] - $ids['product_qty'];
                                $update_stock = "UPDATE stock_purchase SET product_qty = '$new_qty' WHERE pid = '$pid'";
                                mysqli_query($conn, $update_stock);

                                $sql = "INSERT INTO orders (master_id,  pid, p_qty, uid, transaction_id, o_cost, order_status, o_date) VALUES('$n_id',  '$pid', '$qty', '$uid', '$t_id', '$tcost', 'Accepted',now())";
                                if (mysqli_query($conn, $sql)) {

                                    $sqx = "SELECT * FROM orders WHERE uid = '$uid 'AND master_id = '$n_id' AND pid = '$pid'";
                                    $rs = mysqli_query($conn, $sqx);
                                    $row = mysqli_fetch_array($rs);
                                    $oid = $row['oid'];
                                    $pay = "INSERT INTO payment(o_id,u_id,payment_status,payment_date) VALUES('$oid','$uid','1',now())";
                                    mysqli_query($conn, $pay);
                                }
                            }
                        }
                        $sql = "SELECT * FROM orders WHERE master_id = '$n_id' ";
                        $res = mysqli_query($conn, $sql);
                        $t_cost = 0;
                        while ($row = mysqli_fetch_array($res)) {
                            $t_cost += $row['o_cost'];
                        }
                        $sql  = "UPDATE master_order SET total_cost = '$t_cost' WHERE master_oid = '$n_id'";
                        if (mysqli_query($conn, $sql)) {


                            $url = "order-history.php";
                            gotopage($url);
                        }
                    } else {
                        $sql = "SELECT * FROM user_address_book WHERE u_id = '$uid'";
                        $rs = mysqli_query($conn, $sql);
                    ?>

                        <form action="" method="post">
                            <div>
                                <label for="" class="form-label">Transaction ID</label>
                                <input type="text" name="t_id" class="form-control" required=" ">
                            </div>
                            <div>
                                <label for="" class="form-label">Address</label>
                                <select class="dropdown-s" name="address" id="">
                                    <option value="" disabled selected>Select...</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($rs)) {
                                    ?>
                                        <option value="<?php echo $row['u_aid'] ?>"><?php echo $row['state'] . ", " . $row['city'] . ", " . $row['address'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div><br>
                            <button type="submit" name="submit" class="btn btn-success dropdown-s">Buy</button>
                        </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- //check-out -->

    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->
</body>

</html>