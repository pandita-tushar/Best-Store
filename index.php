<?php include 'inc/connect.php';
include 'inc/security.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="js/simpleCart.min.js"></script>
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- timer -->
    <link rel="stylesheet" href="css/jquery.countdown.css" />
    <!-- //timer -->
    <!-- animation-effect -->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
</head>

<body>

    <!-- nav-bar -->
    <?php include 'nav-bar.php' ?>

    <!-- header -->
    <?php include 'header.php' ?>

    <!-- banner -->
    <?php include 'banner.php' ?>

    <!-- collections -->
    <?php

    $sql = "SELECT * FROM product_master WHERE p_status = '1' ORDER BY PID DESC LIMIT 4";
    $rs = mysqli_query($conn, $sql);

    ?>
    <div class="new-collections">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">New Collections</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s"></p>
            <?php

            while ($row = mysqli_fetch_array($rs)) {
                $pid = $row['pid'];
                $pcat_id = $row['product_category'];
            ?>
                <div class="new-collections-grids">
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="products.php" class="product-image"><img src="manage/uploads/<?php echo $row['pic2'] ?>" alt=" " class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href=<?php echo "quick-view.php?pid=$pid&pcat_id=$pcat_id"; ?>>Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    <p>New</p>
                                </div>
                            </div>
                            <h4><a href="single.html"><?php echo $row['p_name'] ?></a></h4>
                            <p><?php echo $row['detail'] ?>.</p>
                            <?php $cartpid = $row['pid'] ?>
                            <?php
                            ?>
                        <form action="add-to-cart.php" method="post">
                        <input type="text" hidden name="pid" value="<?php echo $pid; ?>">
                            <div class="new-collections-grid1-left simpleCart_shelfItem occasion-cart">
                                <p><span class="item_price">₹ <?php echo $row['cost'] ?></span><button type="submit" name="submit" class="item_add btn btn-outline-warning">Add to cart</button></p>
                            </div>
                            </form>
                        </div>
                        <div class="clearfix"> </div>

                    </div>
                </div>
            <?php

            }
            if (isset($_POST['submitt'])) {
                $user_id = $_SESSION['userID'];
                $pid = $_POST['pid'];
                $sql = "INSERT INTO cart (user_id, product_id, product_qty) VALUES ('$user_id', '$pid','1')";
                if (mysqli_query($conn, $sql)) {
                    mysqli_close($conn);
                } else {
                    mysqli_close($conn);
                }
            }
            ?>
            <div class="clearfix"> </div>
        </div>
    </div>
    </div>
    <!-- //collections -->
    <!-- collections-bottom -->
    <div class="collections-bottom">
        <div class="container">
            <div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
                <h3>Newsletter</h3>
                <p>Join us now to get all news and special offers.</p>
                <form>
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    <input type="email" value="Enter your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email address';}" required="">
                    <input type="submit" value="Join Us">
                </form>
            </div>
        </div>
    </div>
    <!-- //collections-bottom -->

    <!-- footer -->
    <?php include 'footer.php' ?>


</body>

</html>