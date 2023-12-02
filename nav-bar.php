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
    <!-- nav -->
    <div class="header">
        <div class="container">
            <div class="header-grid">
                <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <ul>
                    
                        <?php
                        if (!isset($_SESSION['userName'])) {
                        ?>
                            <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="log-in.php">Login</a></li>
                            <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Register</a></li>

                        <?php
                        } else {
                            $uid = $_SESSION['userID'];
                            $sql = "SELECT * FROM user";
                            $rs = mysqli_fetch_array(mysqli_query($conn, $sql));
                            $pic = $rs['dp'];
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($pic == ""){ ?>  <img src="assets/images/profile-icon.jpg" height="23" width="23" alt=""><?php }else{ ?><img src="assets/images/<?php echo $rs['dp']; ?>"  height="23" width="23" alt="" style="border-radius: 50%;"> <?php } ?> &nbsp;<u><b><?php echo $_SESSION['userName']; ?></b>&nbsp;<b class="caret"></b></u></a>
                                <ul class="dropdown-menu multi-column column-3">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <ul class="multi-column-dropdown">
                                                <li><a href=<?php echo "edit-profile.php?uid=$uid"; ?>>Edit&nbsp;Profile</a></li><br>
                                                <li><a href="order-history.php">Order&nbsp;History</a></li><br>
                                                <li><a href="address-book.php">Adress&nbsp;Book</a></li><br>
                                                <li><a href="log-out.php">Sign&nbsp;Out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                    <ul class="social-icons">
                        <li><a href="#" class="facebook"></a></li>
                        <li><a href="#" class="twitter"></a></li>
                        <li><a href="#" class="g"></a></li>
                        <li><a href="#" class="instagram"></a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

</body>


</html>