<?php include 'inc/connect.php';
include 'inc/security.php';
if (!isset($_SESSION['userID'])) {
    $msg = "Log in to access your cart";
    $url = "log-in.php?msg=$msg";
    gotopage($url);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
    <!-- fo
    
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
                <li class="active">Cart</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <!-- cart -->
    <?php
    $uid = $_SESSION['userID'];
    $sqla = "SELECT count(*) as cnt FROM cart WHERE user_id = $uid";
    $result = mysqli_query($conn, $sqla);
    $arr = mysqli_fetch_array($result);
    ?>
    <div class="checkout">
        <div class="container">
            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span><?php echo $arr['cnt'];
                                                                                                            if ($arr['cnt'] == '1') echo " Product";
                                                                                                            if ($arr['cnt'] > '1') echo " Products";
                                                                                                            if ($arr['cnt'] < '1') echo " There is nothing in your cart"; ?> </span></h3>
            <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <div align="right"><button  class="cbtn btn-danger" onclick="location.reload()">Refresh Page</button></div>
                
                <!-- <button class="cbtn btn-danger" onclick="location.reload()">Refresh Page</button> -->
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th scope="col-3">Quantity</th>
                            <th>Product Name</th>
                            <!-- <th>Service Charges</th> -->
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php
                    $uid = $_SESSION['userID'];
                    $sql = "SELECT * FROM cart LEFT JOIN product_master ON cart.product_id = product_master.pid WHERE user_id = $uid";
                    $rs = mysqli_query($conn, $sql);
                    $i = 1;
                    while ($row = mysqli_fetch_array($rs)) {
                        $cid = $row['cid'];
                        $pid = $row['pid'];
                        $product_qty = $row["product_qty"];
                        $pcat_id = $row['product_category'];
                    ?>
                        <tr class="rem1">
                            <td class="invert"><?php echo $i; ?></td>
                            <td class="invert-image"><a href=<?php echo "quick-view.php?pid=$pid&pcat_id=$pcat_id"; ?>><img src="manage/uploads/<?php echo $row['pic2']; ?>" alt="" class="img-responsive" /></a></td>
                            <td class="invert">
                                <!-- <div class="quantity"> -->

                                <div class="quantity-select">
                                    <div class=" value-plus active"><button class="add entry value-plus active" data-cid="<?php echo $cid; ?>">+</button></div>
                                    <div class="entry value"><span id="quantity-<?php echo $cid; ?>"><?php echo $product_qty; ?></span></div>
                                    <div class=" value-minus "><button class="subtract entry value-minus active" data-cid="<?php echo $cid; ?>">-</button></div>
                                </div>

                                <!-- </div> -->
                            </td>
                            <td class="invert"><?php echo $row['p_name']; ?></td>
                            <!-- <td class="invert">$5.00</td> -->
                            <td class="invert">₹ <?php echo $row['cost'] * $row['product_qty']; ?></td>
                            <td class="invert">
                                <a href=<?php echo "remove_from_cart.php?cid=$cid"; ?>><img src="assets/images/remove.png" width="70" height="50" alt=""></a>
                            </td>
                        </tr>
                        <!--quantity-->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

                        <!--quantity-->
                    <?php
                        $i++;
                    }
                    ?>
                </table>
            </div>
            <div class="checkout-left">
                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                    <h4>Continue to basket</h4>
                    <ul>
                        <?php
                        $uid = $_SESSION['userID'];
                        $sql = "SELECT * FROM cart LEFT JOIN product_master ON cart.product_id = product_master.pid WHERE cart.user_id = $uid";
                        $rs = mysqli_query($conn, $sql);
                        $i = 1;
                        $total = 0;
                        while ($row = mysqli_fetch_array($rs)) {
                        ?>
                            <li>Product <?php echo $i; ?> <i>-</i> <span>₹ <?php echo $row['cost']; ?><?php if ($row['product_qty'] == '1') echo "";
                                                                                                        else echo " x " . $row['product_qty']; ?> </span></li>
                            <!-- <li>Total Service Charges <i>-</i> <span>$15.00</span></li> -->

                        <?php
                            $total += $row['cost'] * $row['product_qty'];
                            $i++;
                        }
                        ?>
                        <li>Total <i>-</i> <span>₹ <?php echo $total; ?> </span></li>
                    </ul>
                </div>
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href=<?php echo "checkout.php?uid=$uid"; ?>><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Check Out</a>
                </div>
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //cart -->

    <script>
        $(document).ready(function() {
            $(".add").click(function() {
                var cid = $(this).data("cid");
                var product_qty = parseInt($("#quantity-" + cid).text());
                $("#quantity-" + cid).text(product_qty + 1);
                updateQuantity(cid);
            });

            $(".subtract").click(function() {
                var cid = $(this).data("cid");
                var product_qty = parseInt($("#quantity-" + cid).text());
                if (product_qty > 1) {
                    $("#quantity-" + cid).text(product_qty - 1);
                    updateQuantity(cid);
                }
            });

            function updateQuantity(cid) {
                var product_qty = $("#quantity-" + cid).text();
                $.ajax({
                    type: "POST",
                    url: "update_quantity.php",
                    data: {
                        cid: cid,
                        product_qty: product_qty
                    },
                    success: function() {
                        // Do something after the quantity is updated
                    }
                });
            }
        });
    </script>


    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->
</body>

</html>