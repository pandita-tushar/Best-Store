<?php
include 'inc/connect.php';
include 'inc/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WMS - Manage Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <!-- ======= Header ======= -->
    <?php include 'nav_bar.php'; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include 'side_bar.php'; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='index.php'>Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="admin-manage.php">Manage</a></li>-->
                    <li class="breadcrumb-item active">Manage Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="col-6">
                                    <form class="d-flex" method="post" action="">
                                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6 mb-1" align="right">
                                        <?php
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        }
                                        ?>
                                        <!-- <a href='add_new_admin.php' class='btn btn-primary'>Add New</a> -->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Mail</th>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>


                                            <?php
                                            if (isset($_POST['submit'])) {
                                                $search = mysqli_escape_string($conn, $_POST['search']);
                                                $sql = "select * from user where u_name LIKE '%$search%' or u_mail LIKE '%$search%' or u_mobile LIKE '%$search%' or u_country LIKE '%$search%' or u_address LIKE '%$search%'";
                                            } else {
                                                // echo "error";
                                                $sql = "select * from user";
                                            }
                                                $rs = mysqli_query($conn, $sql);
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($rs)) {
                                                    $uid = $row['uid'];

                                            ?>
                                                    <tbody>
                                                        <tr>
                                                        <th scope="row"><?php echo $i; ?></th>
                                                            <td><?php echo $row['u_name']; ?></td>
                                                            <td><?php echo $row['u_mobile']; ?></td>
                                                            <td><?php echo $row['u_mail']; ?></td>
                                                            <td><?php echo $row['u_country']; ?></td>
                                                            <td><?php echo $row['u_address']; ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($row['u_status'] == 1) {
                                                                
                                                                    echo "<a href=user_status.php?sts=0&uid=$uid><img src='assets/img/onn-switch.jpg' height='30' width='50' alt=''></a>";
                                                                    
                                                                
                                                                } else {
                                                                
                                                                    echo "<a href=user_status.php?sts=1&uid=$uid><img src='assets/img/off-switch.jpg' height='30' width='50' alt=''></a>";
                                                                
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="centre"> <a href=<?php echo "user_delete.php?uid=$uid" ?>><img src="assets/img/delete-icon.png" height="30" width="30" alt=""></a></td>
                                                    <?php
                                                    $i++;
                                                }
                                                    ?>
                                                    </tbody>
                                        </table>