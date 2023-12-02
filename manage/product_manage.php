<?php
include 'inc/connect.php';
include 'inc/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WMS - Manage Product Master</title>
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
            <h1>Manage Products </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Products</li>
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
                                        <!-- <input type="text" name="" id=""> -->
                                        <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6 mb-1" align="right">
                                        <?php
                                        $itemsPerPage = 10;
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page - 1) * $itemsPerPage;
                                        // echo $page;
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        }
                                        ?>
                                        <a href='product_add.php' class='btn btn-primary'>Add New</a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <!-- <th scope="col">Product ID</th> -->
                                                    <th scope="col">Detail</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Sub-Category</th>
                                                    <th scope="col">Brand</th>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Cost</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            if (isset($_POST['submit'])) {
                                                $search = mysqli_escape_string($conn, $_POST['search']);
                                                $sql = "select * from product_master where p_name LIKE '%$search%' or detail LIKE '%$search%' or product_category LIKE '%$search%' or product_sub_category LIKE '%$search%' or code LIKE '%$search%' or p_status LIKE '%$search%'";
                                            } else {
                                                // echo "error";
                                                $sql = "SELECT * FROM product_master  ORDER BY cast(code as int) LIMIT $start, $itemsPerPage";
                                            }
                                            // querry to fetch total number of items
                                            $totalQuery = "SELECT COUNT(*) as total FROM product_master";
                                            $totalResult = mysqli_query($conn, $totalQuery);
                                            $totalRows = mysqli_fetch_assoc($totalResult)['total'];
                                            // calculating total number of pages
                                            $totalPages = ceil($totalRows / $itemsPerPage);

                                            $rs = mysqli_query($conn, $sql);
                                            $i = $start + 1;
                                            while ($row = mysqli_fetch_array($rs)) {
                                                $pid = $row['pid'];
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"> <?php echo $i; ?> </th>
                                                        <td> <?php echo $row['p_name'] ?> </td>
                                                        <!-- <td> <?php echo $row['pid'] ?> </td> -->
                                                        <td> <?php echo $row['detail'] ?> </td>
                                                        <td> <?php
                                                                $new_cat = $row['product_category'];
                                                                $sqlc = " SELECT * FROM category WHERE cat_id = $new_cat ";
                                                                $rsx = mysqli_query($conn, $sqlc);
                                                                $rowx  = mysqli_fetch_array($rsx);
                                                                echo $rowx['name'] ?> </td>
                                                        <td> <?php
                                                                $new_scat = $row['product_sub_category'];
                                                                $sqls = " SELECT * FROM sub_category WHERE sc_id = $new_scat ";
                                                                $rsy = mysqli_query($conn, $sqls);
                                                                $rowy  = mysqli_fetch_array($rsy);
                                                                echo $rowy['s_name'] ?> </td>
                                                        <td> <?php
                                                                $new_brand = $row['product_brand'];
                                                                $sqlb = " SELECT * FROM brand WHERE b_id = $new_brand ";
                                                                $rsb = mysqli_query($conn, $sqlb);
                                                                $rowb  = mysqli_fetch_array($rsb);
                                                                echo $rowb['b_name'] ?> </td>
                                                        <td> <?php echo $row['code'] ?> </td>
                                                        <td> ₹<?php echo $row['cost'] ?> </td>
                                                        <td> <?php
                                                                if ($row['p_status'] == 1) {

                                                                    echo "<a href=product_status.php?sts=0&pid=$pid><img src='assets/img/onn-switch.jpg' height='30' width='50' alt=''></a>";
                                                                } else {

                                                                    echo "<a href=product_status.php?sts=1&pid=$pid><img src='assets/img/off-switch.jpg' height='30' width='50' alt=''></a>";
                                                                }
                                                                ?>
                                                        </td>
                                                        <td align="centre"> <a href=<?php echo "product_update.php?pid=$pid"; ?>><img src="assets/img/edit-icon.png" height="30" width="30" alt=""></a> <a href=<?php echo "product_delete.php?pid=$pid" ?>><img src="assets/img/delete-icon.png" height="30" width="30" alt=""></a></td>
                                                    </tr>
                                                <?php
                                                $i++;
                                            }
                                            
                                                ?>
                                                </tbody>
                                        </table>
                                        <div>
                                            <button>
                                                <?php
                                            // Generate pagination links
                                            echo "<ul class='pagination'>";
                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                echo "<li><a href='?page=$i'>$i</a></li>";
                                            }
                                            echo "</ul>";
                                            ?>
                                        </button>
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
        </section>
    </main>
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