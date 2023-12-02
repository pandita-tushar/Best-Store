<?php include 'inc/connect.php';
include 'inc/security.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Register :: w3layouts</title>
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
    <script src="js/simpleCart.min.js"> </script>
    <!-- cart -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- animation-effect -->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
</head>

<body>
    <!-- header -->
    <?php include 'nav-bar.php'; ?>
    <?php include 'header.php'; ?>
    <!-- //header -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Upload Image</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- Upload image -->

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if an image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get the uploaded file information
        $uid = $_GET['uid'];
        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        // Move the uploaded file to the desired location
        move_uploaded_file($tmp_name, 'assets/images/' . $name);

        // Add the image name to the database
        $mysqli = new mysqli('localhost', 'root', '', 'e_commerce');
        $name = $mysqli->real_escape_string($name);
        $sql = "UPDATE user SET dp = '$name' WHERE uid = '$uid'";
        $mysqli->query($sql);
        $mysqli->close();

        // Redirect to the current page to prevent accidental resubmission
        $msg = "Picture uploaded successfuly";
        $url = "edit-profile.php?msg=$msg&uid=$uid";
        gotopage($url);
    }
}
?>
    <div class="register">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Upload Image</h3>
            <div class="login-form-grids"  >
                <form method="post" enctype="multipart/form-data" style="margin-left: 25%;">
                    <input type="file" name="image" onchange="this.form.submit()">
                </form>
                
            </div>
            
        </div>
    </div>
    <!-- //register -->
    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- //footer -->
</body>

</html>