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
            <h1>Update Stock purchase</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product_manage.php">Manage</a></li>
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
                            $sid = $_GET['sid'];
                            $pid = $_GET['pid'];
                            if (isset($_POST['submit'])) {
                                $date_of_purchase = $_POST['purchase-date'];
                                $mrp = $_POST['mrp'];
                                $cost = $_POST['cost'];
                                $quantity = $_POST['qty'];
                                $og_quantity =   $quantity - $_POST['orig_qty'];
                                $total_cost = $cost * $quantity;
                                $og_t_cost = $cost *$og_quantity;


                                $sql = "UPDATE stock_purchase SET date_of_purchase = now(), mrp = $mrp, cost = $cost, product_qty = $quantity, total_cost = $total_cost WHERE sid = '$sid'";
                                if (mysqli_query($conn, $sql)) {
                                    $msg = "Record Added successfully";
                                    $url = "stock_purchase.php?msg=$msg";
                                    $sql = "INSERT INTO stock_receipts (sid,pid,p_qty,t_cost,date) VALUES('$sid', '$pid', '$og_quantity', '$og_t_cost','$date_of_purchase')";
                                    mysqli_query($conn,$sql);
                                    gotopage($url);
                                } else {
                                    $msg = "Sorry, there was some problem";
                                    $url = "stock_purchase.php?msg=$msg";
                                    gotopage($url);
                                }
                            } else {
                                $sql = "SELECT * FROM stock_purchase LEFT JOIN product_master ON product_master.pid = stock_purchase.pid WHERE sid = '$sid' AND product_master.pid  = $pid";
                                $rs = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_array($rs);
                                $cat_id = $row['product_category'];
                                $query = "SELECT * FROM category LEFT JOIN sub_category ON category.cat_id = sub_category.cat_id WHERE category.cat_id = $cat_id AND sub_category.cat_id = $cat_id ";
                                $res = mysqli_query($conn,$query);
                                $rows = mysqli_fetch_array($res);
                            ?>
                                <div class="row">

                                    <div class="col-md-6 mt-3 mb-3">
                                        <label for="" class="form-label">Product Category</label>
                                        <select name="product-category" id="category" class="form-select" required>
                                            <option selected value="<?php echo $row['product_category']; ?>"><?php echo $rows['name']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3 mb-3">
                                        <label for="" class="form-label">Product Sub-Category</label>
                                        <select name="product-sub-category" id="subcategory" class="form-select" required>
                                            <option selected value="<?php echo $row['product_sub_category']; ?>"><?php echo $rows['s_name']; ?></option>

                                        </select>

                                    </div>
                                    <div class="col-12 mt-3 mb-3">
                                        <label for="" class="form-label">Select Product</label>
                                        <select name="product" id="product" class="form-select" required>
                                            <option selected value="<?php echo $row['pid']; ?>"><?php echo $row['p_name']; ?></option>

                                        </select>
                                    </div>
                                    </div>

                                    <form action="" method="post">
                                        <div class="row">

                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Date</label>
                                            <input type="date" name="purchase-date" value="<?php echo $row['date_of_purchase'] ; ?>" class="form-control" id="">
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">MRP</label>
                                            <input type="text" class="form-control" value="<?php echo $row['mrp'] ; ?>" name="mrp">
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Cost</label>
                                            <input type="text" class="form-control" value="<?php echo $row['cost'] ; ?>" name="cost">
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Quantity</label>
                                            <input type="text" hidden name="orig_qty" value="<?php echo $row['product_qty'] ; ?>" id="">
                                            <input type="number" name="qty" id="" value="<?php echo $row['product_qty'] ; ?>" class="form-control">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Template Main JS File -->



    <script src="assets/js/main.js"></script>

</body>

</html>