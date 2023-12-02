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
    <!-- End Sidebar -->




    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="manage_admin.php">Manage</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (isset($_POST['submit'])) {
                                $a_type = $_POST['admin-type'];
                                $a_name = $_POST['admin-name'];
                                $a_mobile = $_POST['admin-mobile'];
                                $a_mail = $_POST['admin-mail'];
                                $a_password = $_POST['admin-password'];
                                $a_status = '1';

                                $sql = "INSERT INTO admin (name, mobile, mail, password, type, status) VALUES( '$a_name','$a_mobile','$a_mail','$a_password','$a_type', '$a_status' )";

                                if (mysqli_query($conn, $sql)) {
                                    $msg = "Record created successfully";
                                    $url = "manage_admin.php?msg=$msg";
                                    // header("Location:manage_admin.php?msg=$msg");
                                    gotopage($url);
                                } else {
                                    $msg = "Sorry, there was some problem";
                                    // header("Location:manage_admin.php?msg=$msg");
                                    $url = "manage_admin.php?msg=$msg";
                                    gotopage($url);
                                }
                            } else {
                            ?>

                                <form action="" method="post">
                                    <div class="col-md-12 mt-3 mb-3">
                                        <label for="" class="form-label">Admin Type</label>
                                        <select name="admin-type" class="form-select" required>
                                            <option selected value="">Choose...</option>
                                            <option value="Operator">Operator</option>
                                            <option value="Master Admin">Master Admin</option>
                                        </select>
                                    </div>
                                    <div class="row mt-3 mb-3"">
                        <div class=" col-md-6 mt-3 mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="admin-name">
                                    </div>
                                    <div class="col-md-6 mt-3 mb-3">
                                        <label for="" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" name="admin-mobile">
                                    </div>
                                    <div class="col-md-6 mt-3 mb-3">
                                        <label for="" class="form-label">Mail</label>
                                        <input type="email" class="form-control" name="admin-mail">
                                    </div>
                                    <div class="col-md-6 mt-3 mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="admin-password">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">Reset</button>
                                    </div>
                        </div>
                        </form>
                    <?php
                            }
                    ?>
                    </div>
                </div>

            </div>
            </div>
        </section>

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>