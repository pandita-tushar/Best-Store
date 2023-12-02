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
    <script src="js/jquery.wmuSlider.js"></script>
    <script>
        $('.example1').wmuSlider();
    </script>

    <!-- //animation-effect -->
</head>

<body>
    <!-- header-->
    <div class="header">
        <div class="container">
            <div class="header-grid">
                <div class="logo-nav">
                    <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                        <h1><a href="index.php">Best Store <span>Shop anywhere</span></a></h1>
                    </div>
                    <div class="logo-nav-left1">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.php" class="act">Home</a></li>
                                    <!-- Mega Menu -->
                                    <?php
                                    $sql = "SELECT * FROM category  ";
                                    $rs = mysqli_query($conn, $sql);
                                    ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <?php
                                                while ($row = mysqli_fetch_array($rs)) {
                                                    $cat_id = $row['cat_id'];
                                                    $sqls = "SELECT * FROM sub_category WHERE cat_id = $cat_id";
                                                    $res = mysqli_query($conn, $sqls);;
                                                ?>
                                                    <div class="col-sm-4">
                                                        <ul class="multi-column-dropdown">
                                                            <h6><?php echo $row['name']; ?></h6>
                                                            <?php
                                                            while ($rows = mysqli_fetch_array($res)) {
                                                                $subcat_id = $rows['sc_id']

                                                            ?>
                                                                <li><a href=<?php echo "products.php?subcat_id=$subcat_id&cat_id=$cat_id"; ?>><?php echo $rows['s_name']; ?></a></li>
                                                            <?php
                                                            }
                                                            ?>

                                                        </ul>
                                                    </div>
                                                <?php
                                                }

                                                ?>


                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<b class="caret"></b></a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <?php
                                                $sql = "SELECT * FROM category ";
                                                $rs = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($rs)) {
                                                    $cat_id = $row['cat_id'];
                                                    $cats = "SELECT * FROM brand WHERE cat_id = $cat_id";
                                                    $result = mysqli_query($conn, $cats);

                                                ?>
                                                    <div class="col-sm-4">
                                                        <ul class="multi-column-dropdown">
                                                            <h6><?php echo $row['name']; ?></h6>
                                                            <?php
                                                            while ($rows = mysqli_fetch_array($result)) {
                                                                $brand_id = $rows['b_id'];
                                                            ?>
                                                                <li><a href=<?php echo "brand-wise-products.php?brand_id=$brand_id"; ?>><?php echo $rows['b_name']; ?></a></li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                <?php
                                                }

                                                ?>


                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>
                                    </li>

                                    <li><a href="mail-us.php">Mail Us</a></li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="logo-nav-right">
                        <div class="search-box">
                            <div id="sb-search" class="sb-search">
                                <form>
                                    <input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search"> </span>
                                </form>
                            </div>
                        </div>
                        <!-- search-scripts -->
                        <script src="js/classie.js"></script>
                        <script src="js/uisearch.js"></script>
                        <script>
                            new UISearch(document.getElementById('sb-search'));
                        </script>
                        <!-- //search-scripts -->
                    </div>
                    <div class="header-right">
                        <div class="cart box_1">
                            <a href="cart.php">
                                <h3>
                                    <div class="total">
                                        <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)
                                    </div>
                                    <img src="images/bag.png" alt="" />
                                </h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>


    <!-- //header -->
</body>

</html>