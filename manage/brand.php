<?php include 'inc/connect.php';
include 'inc/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WMS - Manage Product Category</title>
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
            <?php
            $cat_id = $_GET['cat_id'];
            $sql  ="SELECT name  FROM category WHERE cat_id = '$cat_id'";
            $result = mysqli_query($conn,$sql);
            $rowe = mysqli_fetch_array($result);
            ?>
            <h1>Manage brands for: <?php echo $rowe['name']; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product_category.php">Manage</a></li>
                    <li class="breadcrumb-item active">Manage Brands</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="row">
                                    <div class="col-6">
                                        <form class="d-flex" method="post" action="">
                                            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <form action="" method="post" class="d-flex">
                                            <select name="brand_cat" class="form-select">
                                                <?php
                                                $cat_id = $_GET['cat_id'];
                                                $sql = "SELECT * FROM category WHERE cat_id = $cat_id  ";
                                                $rs = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($rs)) {
                                                ?>
                                                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    $sql = "SELECT * FROM category WHERE cat_id != $cat_id  ";
                                                    $rs = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($rs)) {
                                                    ?>
                                                        <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                                    }
                                                }

                                                ?>
                                            </select>&nbsp;
                                            <button type="submit" name="submitbrand" class="btn btn-outline-primary ml-3">Submit</button>
                                        </form>
                                    </div>

                                    <div class="col" align="right">
                                        <?php
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        }
                                        $cat_id = $_GET['cat_id'];

                                        ?>

                                        <a href=<?php echo "brand_add.php?cat_id=$cat_id"; ?> class='btn btn-primary'>Add New</a>
                                    </div>

                                    <div class="table-responsive mt-5">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <!-- <th scope="col" class="text-center">Category</th> -->
                                                    <th scope="col" class="text-center">Name</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['submit'])) {
                                                    $search = mysqli_escape_string($conn, $_POST['search']);
                                                    $sql = "SELECT * FROM brand  WHERE b_name LIKE '%$search%' ";
                                                } elseif (isset($_POST['submitbrand'])) {
                                                    $brand_cat = $_POST['brand_cat'];

                                                    $sqlx = "SELECT * FROM brand WHERE cat_id = '$brand_cat' ";
                                                    // echo $sqlx;
                                                    $rsx = mysqli_query($conn, $sqlx);
                                                    $rowx =  mysqli_fetch_array($rsx);
                                                    $cat_idx = $rowx['cat_id'];
                                                    $cat_id = $cat_idx;
                                                    $url = "brand.php?cat_id=$cat_id";
                                                    gotopage($url);
                                                    // header("Location:sub_category.php?cat_id=$cat_id");
                                                    $sql = "SELECT * FROM brand WHERE cat_id = $cat_idx ";
                                                } else {
                                                    $cat_id = $_GET['cat_id'];
                                                    $sql = "SELECT * FROM brand INNER JOIN category ON brand.cat_id = category.cat_id WHERE brand.cat_id = $cat_id ";
                                                }
                                                $rs = mysqli_query($conn, $sql);
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($rs)) {
                                                    $b_id = $row['b_id'];
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?php echo $i; ?></th>
                                                        <!-- <td align="center"><?php echo $row['name']; ?></td> -->
                                                        <td align="center"><?php echo $row['b_name']; ?></td>
                                                        <td class="text-center ml-3"> <a href=<?php echo "brand_update.php?b_id=$b_id&cat_id=$cat_id"; ?>> <img src="assets/img/edit-icon.png" height="30" width="30" alt=""></a> <a href=<?php echo "brand_delete.php?b_id=$b_id&cat_id=$cat_id"; ?>><img src="assets/img/delete-icon.png" height="30" width="30" alt=""></a></td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>


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