<?php session_start(); include 'inc/connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
    
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
                <li class="active">Login Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <?php
    if (isset($_POST['submit'])) {
        $mail = $_POST['mail'];
        $pswd = $_POST['password'];

        $sql = "SELECT * FROM user WHERE u_mail = '$mail' AND u_password = '$pswd' AND  u_status = '1'";

        $rs = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($rs);
        $cnt = mysqli_num_rows($rs);

        if ($cnt > 0) {
            $_SESSION['userID'] = $row['uid'];
            $_SESSION['userName'] = $row['u_name'];
            $url = "index.php";
            gotopage($url);
        } else {
            $msg = "*Log In unsuccessful*";
            $url = "log-in.php?msg=$msg";
            gotopage($url);
        }
    }
    ?>

    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form method="post">
                    <div align="center" style="color: red;">
                        <?php
                        if (isset($_GET['msg'])) {
                            echo $_GET['msg'];
                        }
                        ?>
                    </div>
                    <input type="email" name="mail"  placeholder="Email Address" required=" ">
                    <input type="password" name="password" placeholder="Password" required=" ">
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" name="submit" value="Login">
                </form>
            </div>
            <h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
            <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>
    </div>
    <!-- //login -->

    <!-- footer -->
    <?php include 'footer.php' ?>
</body>

</html>