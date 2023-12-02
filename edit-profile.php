<?php include 'inc/connect.php';
include 'inc/security.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <style>
        .cust {
            margin-top: 15px;
            /* margin-bottom: 30px; */
        }

        cst-form {
            margin-left: 200px;
        }


        h2 {
            color: #000;
            text-align: center;
            font-size: 2em;
        }

        .warpper {
            display: flex;
            flex-direction: column;
            /*   align-items: center; */
        }

        .tab {
            cursor: pointer;
            padding: 10px 20px;
            margin: 0px 2px;
            background: #000;
            display: inline-block;
            color: #fff;
            border-radius: 3px 3px 0px 0px;
            box-shadow: 0 0.5rem 0.8rem #00000080;
        }

        .panels {
            background: #fffffff6;
            box-shadow: 0 2rem 2rem #00000080;
            min-height: 200px;
            /*   width:500%; */
            /*   max-width:5000px; */
            border-radius: 3px;
            overflow: hidden;
            padding: 20px;
        }

        .panel {
            display: none;
            animation: fadein .8s;
        }

        @keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .panel-title {
            font-size: 1.5em;
            font-weight: bold
        }

        .radio {
            display: none;
        }

        #one:checked~.panels #one-panel,
        #two:checked~.panels #two-panel,
        #three:checked~.panels #three-panel {
            display: block
        }

        #one:checked~.tabs #one-tab,
        #two:checked~.tabs #two-tab,
        #three:checked~.tabs #three-tab {
            background: #fffffff6;
            color: #000;
            border-top: 3px solid #000;
        }

        /*********** Form CSS ***********/
        #centered {
            max-width: 900px;
            margin: 50px auto 0;
        }

        input,
        textarea {

            font-weight: 300;
            width: 100%;
            margin: 8px 0;
            text-indent: 1em;
            padding: 10px 0;
            border-radius: 3px;
            border: 1px solid lightgray;
        }

        input[type="submit"] {
            background-color: #4d90fe;
            color: white;
            /*   max-width:300px; */
            border: 1px solid #3079ed;
        }

        input[type="submit"]:hover {
            background-color: #4d9aff;
            color: white;
        }

        p {
            margin-top: 10px;
            font-size: 0.75em;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: inherit;
        }

        a:hover {
            color: #4d9aff;
        }

        i {
            margin: 5px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include 'nav-bar.php' ?>
    <?php include 'header.php' ?>
    <!-- //header -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <?php
    $uid = $_GET['uid'];
    $sql = "SELECT * FROM user WHERE uid = '$uid'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $mobile = $_POST['mobile'];
        $country = $_POST['country'];
        $address = $_POST['address'];

        $query = "UPDATE user SET u_name = '$name', u_mail = '$mail', u_mobile = '$mobile', u_country = '$country', u_address = '$address' WHERE uid = '$uid'";
        if (mysqli_query($conn, $query)) {
            $msg = "Profile updated successfully";
            $url = "edit-profile.php?msg=$msg&uid=$uid";
            gotopage($url);
        } else {
            $msg = "Sorry, There was some error";
            $url = "edit-profile.php?msg=$msg&uid=$uid";
            gotopage($url);
        }
    }
    ?>
    <!-- here pasword submit enters -->
    <?php
    if (isset($_POST['submitt'])) {
        $pswd = $_POST['pswd'];
        $n_pswd = $_POST['n-pswd'];
        $c_pswd = $_POST['c-pswd'];
        $password = $row['u_password'];

        if ($pswd != $password) {
            $w_msg = "Incorrect password";
            $url = "edit-profile.php?w_msg=$w_msg&uid=$uid";
            gotopage($url);
        } else {
            if ($n_pswd != $c_pswd) {
                $w_msg = "Confirm password not same as new password";
                $url = "edit-profile.php?w_msg=$w_msg&uid=$uid";
                gotopage($url);
            } else {
                $query = "UPDATE user SET u_password = '$n_pswd' WHERE uid = '$uid'";
                if (mysqli_query($conn, $query)) {
                    $msg = "Password updated succesfully";
                    $url = "edit-profile.php?msg=$msg&uid=$uid";
                    gotopage($url);
                } else {
                    $msg = "Sorry, There was some error";
                    $url = "edit-profile.php?msg=$msg&uid=$uid";
                    gotopage($url);
                }
            }
        }
    }
    ?>

    <!-- my test -->
    <div class="warpper">
        <input class="radio" id="one" name="group" type="radio" checked>
        <input class="radio" id="two" name="group" type="radio">
        <div class="tabs">
            <label class="tab" id="one-tab" for="one">Edit Profile</label>
            <label class="tab" id="two-tab" for="two">Change Password</label>

        </div>
        <div class="panels">
            <div class="panel" id="one-panel">
                <div class="mail animated wow zoomIn" data-wow-delay=".5s">
                    <!-- <div class="container"> -->
                    <h3>My Profile</h3>
                    <p class="est" style="color: red;"><?php
                                                        if (isset($_GET['msg'])) {
                                                            echo $_GET['msg'];
                                                        }
                                                        ?></p>
                    <div class="mail-grids">
                        <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                            <form method="post">
                                <div>
                                    <input type="text" name="name" value="<?php echo $row['u_name'] ?>" required="">
                                </div>

                                <div>
                                    <input type="email" name="mail" value="<?php echo $row['u_mail'] ?>" required="">
                                </div>

                                <div>
                                    <input type="text" name="mobile" value="<?php echo $row['u_mobile'] ?>" required="">
                                </div>

                                <div class="cust">
                                    <input type="text" name="country" value="<?php echo $row['u_country'] ?>" required="">
                                </div>

                                <div class="">
                                    <textarea type="text" name="address" required=""><?php echo $row['u_address'] ?></textarea>
                                </div>


                                <input type="submit" name="submit" value="Submit Now">
                            </form>
                        </div>
                        <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
                            <div class="mail-grid-right1">
                                <a href=<?php echo "display-picture.php?uid=$uid"; ?>><?php if ($row['dp'] == "") { ?><img src="assets/images/profile-icon.jpg" height="100" width="100" alt=""><?php } else { ?><img src="assets/images/<?php echo $row['dp']; ?>" alt=" " class="img-responsive" /><?php } ?></a>
                                <!-- <form method="post" enctype="multipart/form-data"> -->
                                    <!-- <p>Change image </p> -->
                                <!-- </form> -->
                                <!-- <h4>Rita Williumson <span>Manager</span></h4> -->
                                <br><br>
                                <ul class="social-icons">
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="g"></a></li>
                                    <li><a href="#" class="instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" id="two-panel">
                <!-- <div class="panel-title">Take-Away Skills</div> -->
                <div class="mail animated wow zoomIn" data-wow-delay=".5s">
                    <h3>Change Password</h3>
                    <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
                        <br>
                        <!-- <h4 class="est animated wow zoomIn">Change Password</h4> -->
                        <!-- <div><br> -->
                        <div style="color: red; margin-left: 148%;">
                            <?php
                            if (isset($_GET['w_msg'])) {
                                echo $_GET['w_msg'];
                            }
                            ?>
                        </div><br>
                    </div>
                </div>

                <!-- <div class="col-md-8 mail-grid-left animated wow slideInLeft"  data-wow-delay=".5s"> -->
                <div id="centered">
                    <form class="" action="#" method="POST" name="form_for_treehouse_contest">



                        <!--       <h2>Howdy?</h2> -->
                        <div><input type="password" name="pswd" placeholder="Current Password" required></div><br>
                        <div><input type="password" name="n-pswd" placeholder="New Password" required></div><br>
                        <div><input type="password" name="c-pswd" placeholder="Confirm Password" required></div><br>
                        
                        <div><input type="submit" name="submitt" value="Submit" id="send"></div><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    

    <!-- //main -->
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->

</body>

</html>