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
            <h1>Manage Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="admin-manage.php">Manage</a></li>-->
                    <li class="breadcrumb-item active">Manage Product</li>
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
                                    
                                    <div class="col mb-2" align="right">
                                    <?php
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        }
                                        ?>
                                        <a href='category_add.php' class='btn btn-primary'>Add New</a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Category</th>
                                                    <th scope="col" class="text-center">Sub-Category</th>
                                                    <th scope="col" class="text-center">Brands</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['submit'])) {
                                                    $search = mysqli_escape_string($conn, $_POST['search']);
                                                    $sql = "select * from category where name LIKE '%$search%' or status LIKE '%$search%'";
                                                } else {
                                                    $sql = "SELECT * from category  order by name";
                                                }
                                                $rs = mysqli_query($conn, $sql);
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($rs)) {
                                                    $cat_id = $row['cat_id'];
                                                    
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?php echo $i; ?></th>
                                                        <td align="center"><?php echo $row['name']; ?></td>
                                                        <td class="text-center"><a href=<?php echo "sub_category_add.php?cat_id=$cat_id"; ?>><img src="assets/img/add.png" height="25" alt=""></a> <a href=<?php echo "sub_category.php?cat_id=$cat_id"; ?>><img src="assets/img/view.png" height="25" alt=""></a> </td>
                                                        <td class="text-center"> <a href=<?php echo "brand_add.php?cat_id=$cat_id"; ?>><img src="assets/img/add.png" height="25" alt=""></a>  <a href=<?php echo "brand.php?cat_id=$cat_id"; ?>><img src="assets/img/view.png" height="25" alt=""></a> </td>
                                                        <td align="center">
                                                            <?php
                                                            if ($row['status'] == 1) {
                                                            
                                                                echo "<a href=category_status.php?sts=0&cat_id=$cat_id><img src='assets/img/onn-switch.jpg' height='30' width='50' alt=''></a>";
                                                            
                                                            } else {
                                                            
                                                                echo "<a href=category_status.php?sts=1&cat_id=$cat_id><img src='assets/img/off-switch.jpg' height='30' width='50' alt=''></a>";
                                                            
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center"><a href=<?php echo "category_update.php?cat_id=$cat_id" ; ?>><img src="assets/img/edit-icon.png" height="30" width="30" alt=""></a> <a href=<?php echo "category_delete.php?cat_id=$cat_id" ?>><img src="assets/img/delete-icon.png" height="30" width="30" alt=""></a></td>
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