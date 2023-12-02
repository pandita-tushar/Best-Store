<?php include 'inc/connect.php';
include 'inc/security.php'; error_reporting(0) ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <style>
        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color: white;
            background-color: #1F2739;
        }

        h1 {
            font-size: 3em;
            font-weight: 300;
            line-height: 1em;
            text-align: center;
            color: #4DC3FA;
        }

        h2 {
            font-size: 1em;
            font-weight: 300;
            text-align: center;
            display: block;
            line-height: 1em;
            padding-bottom: 2em;
            color: #FB667A;
        }

        h2 a {
            font-weight: 700;
            text-transform: uppercase;
            color: #FB667A;
            text-decoration: none;
        }

        .blue {
            color: #185875;
        }

        .yellow {
            color: #FFF842;
        }

        .container-t th h1 {
            font-weight: bold;
            font-size: 1em;
            text-align: left;
            color: #185875;
        }

        .container-t td {
            font-weight: normal;
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
        }

        .container-t {
            text-align: left;
            overflow: hidden;
            width: 80%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
        }

        .container-t td,
        .container-t th {
            padding-bottom: 2%;
            padding-top: 2%;
            padding-left: 2%;
        }

        /* Background-color of the odd rows */
        .container-t tr:nth-child(odd) {
            background-color: #a3b9c7;
        }

        /* Background-color of the even rows */
        .container-t tr:nth-child(even) {
            background-color: #95a4ad;
        }

        .container-t th {
            background-color: #949191;
        }

        .container-t td:first-child {
            color: #FB667A;
        }

        .container-t tr:hover {
            background-color: #464A52;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
            -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
        }

        .container-t td:hover {
            background-color: #FFF842;
            color: #403E10;
            font-weight: bold;

            box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
            transform: translate3d(6px, -6px, 0);

            transition-delay: 0s;
            transition-duration: 0.4s;
            transition-property: all;
            transition-timing-function: line;
        }

        @media (max-width: 800px) {

            .container-t td:nth-child(4),
            .container-t th:nth-child(4) {
                display: none;
            }
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
                <li class="active">Order history</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->


    <!-- order histoy -->
    <div class="login">
        <div class="container-t">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Order History</h3>
            <p style="color: red;" class="est"><?php
                                                if (isset($_GET['msg'])) {
                                                    echo $_GET['msg'];
                                                }
                                                ?></p>
            <div class="" data-wow-delay=".5s"><br><br>
                <table class="container">
                    <thead>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Transaction ID</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $uid = $_SESSION['userID'];
                        $i = 1;
                        $querry = "SELECT * FROM orders LEFT JOIN product_master ON orders.pid = product_master.pid LEFT JOIN payment ON orders.oid = payment.o_id WHERE uid = $uid";
                        $rs = mysqli_query($conn, $querry);
                        while ($res = mysqli_fetch_array($rs)) {
                            $status = $res['order_status'];
                            $oid = $res['oid'];
                            $rejected = "SELECT * FROM rejected_orders WHERE r_oid = $oid ";
                            $results = mysqli_query($conn,$rejected);
                            $rows = mysqli_fetch_assoc($results);
                            $r_oid = $rows['r_oid'];
                            $r_status = $rows['approval'];

                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $res['p_name']; ?></td>
                                <td><?php echo $res['p_qty']; ?></td>
                                <td><?php echo $res['transaction_id']; ?></td>
                                <td><?php echo $res['payment_status']; ?></td>
                                <td><?php echo $res['order_status']; ?></td>
                                <?php
                                if ($oid == $r_oid) {
                                    if ($r_status == 'Approved') {
                                        echo  '<td>Order Cancelled successfully <br>Refund in process </td>';
                                    } else {
                                        echo  '<td>Order Cancelation rejected</td>';
                                    }
                                } else {
                                    if ($status == 'Delivered') {
                                        echo  '<td><a href="reject.php?oid=' . $oid . '">Return</a></td>';
                                    } else {
                                        echo '<td><a href="reject.php?oid=' . $oid . '">Cancel Order</a></td>';
                                    }
                                }
                                ?>
                            </tr>
                        <?php
                            // exit();
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
    <!-- //order history -->

    <!-- footer -->
    <?php include 'footer.php' ?>
</body>

</html>