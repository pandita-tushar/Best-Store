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
            <h1>Manage sub-category for: <?php echo $rowe['name']; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product_category.php">Manage</a></li>
                    <li class="breadcrumb-item active">Manage Category</li>
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
                                    <div class="col-4">
                                        <form class="d-flex" method="post" action="">
                                            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                                        </form>
                                    </div>
                                    <div class="col-1" ></div>
                                    <div class="col-3">
                                        <form action="" method="post" class="d-flex">
                                            <select name="sub-category" class="form-select">
                                                <?php
                                                $cat_id = $_GET['cat_id'];
                                                $sql = "SELECT * FROM category WHERE cat_id = $cat_id  ";
                                                $rs = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($rs)) {
                                                ?>
                                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    $sql = "SELECT * FROM category WHERE cat_id != $cat_id  ";
                                                    $rs = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($rs)) {
                                                    ?>
                                                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                                    }
                                                }

                                                ?>
                                            </select>&nbsp;
                                            <button type="submit" name="submitcat" class="btn btn-outline-primary ml-3">Submit</button>
                                        </form>
                                    </div>
                                    <div class="col" align="right">
                                        <?php
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        }
                                        ?>

                                    </div>

                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <!-- <th scope="col" class="text-center">Category</th> -->
                                                    <th scope="col" class="text-center">Sub-Category</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['submit'])) {
                                                    $search = mysqli_escape_string($conn, $_POST['search']);
                                                    $sql = "SELECT sub_category.*,category.name FROM sub_category INNER JOIN category ON sub_category.cat_id = category.cat_id  WHERE sub_category.s_name LIKE '%$search%' OR category.name LIKE '%$search%' OR sub_category.s_status LIKE '%$search%'";
                                                } elseif (isset($_POST['submitcat'])) {
                                                    $cat_name = $_POST['sub-category'];

                                                    $sqlx = "SELECT * FROM category WHERE name = '$cat_name' ";
                                                    // echo $sqlx;
                                                    $rsx = mysqli_query($conn, $sqlx);
                                                    $rowx =  mysqli_fetch_array($rsx);
                                                    $cat_idx = $rowx['cat_id'];
                                                    $cat_id = $cat_idx;
                                                    $url = "sub_category.php?cat_id=$cat_id";
                                                    gotopage($url);
                                                    // header("Location:sub_category.php?cat_id=$cat_id");
                                                    $sql = "SELECT sub_category.*, category.name FROM sub_category INNER JOIN category ON sub_category.cat_id = category.cat_id  WHERE category.cat_id = $cat_idx ";
                                                } else {
                                                    $cat_id = $_GET['cat_id'];
                                                    $sql = "SELECT sub_category.*,category.name FROM sub_category INNER JOIN category ON sub_category.cat_id = category.cat_id  WHERE sub_category.cat_id = $cat_id order by sub_category.s_name";
                                                }
                                                $rs = mysqli_query($conn, $sql);
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($rs)) {
                                                    $sc_id = $row['sc_id'];

                                                ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?php echo $i; ?></th>
                                                        <!-- <td align="center"><?php echo $row['name']; ?></td> -->
                                                        <td align="center"><?php echo $row['s_name']; ?></td>
                                                        <td align="center">
                                                            <?php
                                                            if ($row['s_status'] == 1) {

                                                                echo "<a href=sub_category_status.php?sts=0&sc_id=$sc_id&cat_id=$cat_id><img src='assets/img/onn-switch.jpg' height='30' width='50' alt=''></a>";
                                                            } else {

                                                                echo "<a href=sub_category_status.php?sts=1&sc_id=$sc_id&cat_id=$cat_id><img src='assets/img/off-switch.jpg' height='30' width='50' alt=''></a>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center ml-3"> <a href=<?php echo "sub_category_update.php?sc_id=$sc_id&cat_id=$cat_id" ; ?>><img src="assets/img/edit-icon.png" height="30" width="30" alt=""></a> <a href=<?php echo "sub_category_delete.php?sc_id=$sc_id"; ?>><img src="assets/img/delete-icon.png" height="30" width="30" alt=""></a></td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                        <div class="col" align="right">
                                            <a href='sub_category_add.php'><img src="assets/img/add.png" height="25" alt=""></a>

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