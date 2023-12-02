<?php session_start();
include 'inc/connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .dropdown-s {
            width: 417px;
            height: 43px;
            padding: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .dropdown-icon {
            position: relative;
        }

        .dropdown-icon i {
            position: absolute;
            top: 13px;
            left: 15px;
            pointer-events: none;
            color: #d8703f;
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
                <li class="active">Login Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <?php
    $uid = $_SESSION['userID'];
    if (isset($_POST['submit'])) {
        $city = $_POST['city'];
        $state = $_POST['state'];
        $address = $_POST['address'];

        $sql = "INSERT INTO user_address_book(u_id, city, state, address) VALUES('$uid','$city','$state','$address') ";

        if (mysqli_query($conn, $sql)) {
            $msg = "New Address added";
            $url = "address-book.php?msg=$msg";
            gotopage($url);
        } else {
            $msg = "Sorry, there was some error";
            $url = "address-book.php?msg=$msg";
            gotopage($url);
        }
    } else {
    ?>

        <!-- login -->
        <div class="login">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">New Address</h3>
                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                    <form method="post">
                        <div align="center" style="color: red;">
                            <?php
                            if (isset($_GET['msg'])) {
                                echo $_GET['msg'];
                            }
                            ?>
                        </div>
                        <input type="text" name="city" placeholder="City" required=" ">
                        <div class="dropdown-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <select class="dropdown-s" name="state">
                                <option disabled selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>

                        <textarea name="address" id="" cols="47" rows="6" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Detailed Address';}" required="">&nbsp;&nbsp; Detailed Address</textarea>
                        
                        <input type="submit" name="submit" value="Add Address">
                    </form>
                </div>
                
            </div>
        </div>
    <?php
    }
    ?>
    <!-- //login -->

    <!-- footer -->
    <?php include 'footer.php' ?>
</body>

</html>