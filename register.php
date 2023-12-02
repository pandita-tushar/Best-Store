<?php session_start(); include 'inc/connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    
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
                <li class="active">Register Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $mail = $_POST['mail'];
        $pswd = $_POST['password'];
        $npswd = $_POST['npassword'];
        $status = "1";

        if ($pswd != $npswd) {
            $p_msg = "*Password confirmation was not successful*";
            $url = "register.php?p_msg=$p_msg";
            gotopage($url);
        } else {
            $sql = "INSERT INTO user (u_name, u_mobile, u_mail, u_password, u_status) VALUES ('$name', '$number', '$mail', '$pswd', '$status')";
            if (mysqli_query($conn, $sql)) {
                $url = "index.php";
                gotopage($url);
            } else {
                $msg = "Registration was not successful";
                $url = "rgister.php?msg=$msg";
                gotopage($url);
            }
        }
    } else {
    ?>

        <!-- register -->
        <div class="register">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
                <div>
                    <?php
                    if (isset($_GET['msg'])) {
                        echo $_GET['msg'];
                    }
                    ?>
                </div>
                <div class="login-form-grids">
                    <h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5>
                    <form class="animated wow slideInUp" data-wow-delay=".5s" method="post">
                        <input type="text" name="name" placeholder="Full Name..." required=" ">
                        <input type="text" name="number" placeholder="Contact Number..." required=" ">

                        <div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
                            </div>
                        </div>
                        <h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
                        <input type="email" name="mail" placeholder="Email Address" required=" ">
                        <input type="password" name="password" placeholder="Password" required=" ">
                        <input type="password" name="npassword" placeholder="Password Confirmation" required=" ">
                        <div align="center" style="color: red;">
                            <?php
                            if (isset($_GET['p_msg'])) {
                                echo $_GET['p_msg'];
                            }
                            ?>

                            <!-- <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                        </div> -->
                        </div>
                        <input type="submit" name="submit" value="Register">
                    </form>

                <?php
            } ?>
                </div>
                <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                    <a href="index.php">Home</a>
                </div>
            </div>
        </div>
        <!-- //register -->

        <!-- footer -->
        <?php include 'footer.php' ?>
</body>

</html>