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
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product_category.php">Manage</a></li>
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
                                $b_name = $_POST['brand_name'];
                                $b_id = $_GET['b_id'];
                                $cat_id = $_GET['cat_id'];

                                $target_dir = "uploads/";
                                $target_file = $target_dir . basename($_FILES["pic"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $pic_name = $b_name. "." . $imageFileType;
                                if($target_file = $target_dir .$pic_name){

                                if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                                    $msg = "Files uploaded successfully";
                                    $url = "product_manage.php?msg=$msg";
                                    // echo "<div class='alert alert-success'>File uploaded successfully.</div>";
                                   
                                  } 
                                }

                                $sql = "UPDATE brand SET b_name='$b_name', picture = '$pic_name' WHERE b_id = $b_id";


                                if (mysqli_query($conn, $sql)) {
                                    // exit();
                                    $msg = "Sub-Category updated successfully";
                                    $url = "brand.php?msg=$msg&cat_id=$cat_id";
                                    gotopage($url);
                                } else {
                                    $msg = "Sorry, there was some problem";
                                    $url = "brand.php?msg=$msg&cat_id=$cat_id";
                                    gotopage($url);
                                }
                            } else {
                                $b_id = $_GET['b_id'];
                                $sql = "SELECT * FROM brand WHERE b_id = $b_id ";
                                $rs = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($rs);
                            ?>
                                <p>
                                <form class="row g-3" method="post" action="" enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <label for="inputName5" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php echo $row['b_name'] ?>" required>
                                    </div>

                                    <div class="col-md-4 mt-4 ">
                                        <label for="">Image</label>
                                        <input type="file" name="pic" id="pic">
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">Reset</button>
                                    </div>
                                </form>

                                </p>
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