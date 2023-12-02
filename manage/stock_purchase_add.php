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
            <h1>Add Product</h1>
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
                            if (isset($_POST['submit'])) {
                                $product_id = $_POST['product'];
                                $date_of_purchase = $_POST['purchase-date'];
                                $mrp = $_POST['mrp'];
                                $cost = $_POST['cost'];
                                $quantity = $_POST['qty'];
                                $total_cost = $cost * $quantity;


                                $sql = "INSERT INTO stock_purchase (pid, date_of_purchase, mrp, cost, product_qty, total_cost) VALUES('$product_id', '$date_of_purchase', '$mrp', '$cost', '$quantity', '$total_cost')";

                                if (mysqli_query($conn, $sql)) {
                                    $query = "SELECT sid FROM stock_purchase WHERE pid = '$product_id' AND product_qty = '$quantity' AND total_cost = '$total_cost' AND date_of_purchase = '$date_of_purchase'";
                                    $result = mysqli_query($conn,$query);
                                    $row = mysqli_fetch_array($result);
                                    $sid = $row['sid'];
                                    $sql = "INSERT INTO stock_receipts (sid,pid,p_qty,t_cost,date) VALUES('$sid', '$product_id', '$quantity', '$total_cost', '$date_of_purchase')";
                                    mysqli_query($conn,$sql);
                                    $msg = "Record Added successfully";
                                    $url = "stock_purchase.php?msg=$msg";
                                    gotopage($url);
                                } else {
                                    $msg = "Sorry, there was some problem";
                                    $url = "stock_purchase.php?msg=$msg";
                                    gotopage($url);
                                }
                            } else {
                            ?>
                                <form action="" method="post">
                                    <div class="row">

                                        <div class="col-md-6 mt-3 mb-3">
                                            <label for="" class="form-label">Product Category</label>
                                            <select name="product-category" id="category" class="form-select" required>
                                                <option selected value="">Choose...</option>
                                                <?php
                                                $sql = "SELECT * FROM category ";
                                                $rs = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($rs)) {
                                                ?>
                                                    <option value="<?php echo $row['cat_id'] ?> "><?php echo $row['name'] ?></option>


                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-3 mb-3">
                                            <label for="" class="form-label">Product Sub-Category</label>
                                            <select name="product-sub-category" id="subcategory" class="form-select" required>
                                                <option selected value="">Choose...</option>

                                            </select>

                                        </div>
                                        <div class="col-12 mt-3 mb-3">
                                            <label for="" class="form-label">Select Product</label>
                                            <select name="product" id="product" class="form-select" required>
                                                <option selected value="">Choose...</option>

                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Date</label>
                                            <input type="date" name="purchase-date" class="form-control" id="">
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">MRP</label>
                                            <input type="text" class="form-control" name="mrp">
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Cost</label>
                                            <input type="text" class="form-control" name="cost">
                                        </div>
                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Quantity</label>
                                            <input type="number" name="qty" id="" class="form-control">
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
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_id = $(this).val();
                // alert(category_id);
                if (category_id) {
                    $.ajax({
                        url: 'get_subcategories.php',
                        type: 'POST',
                        data: {
                            category_id: category_id
                        },
                        success: function(html) {
                            // alert(html);
                            $('#subcategory').html(html);
                        }
                    });
                } else {
                    $('#subcategory').html('<option value="">Select a subcategory</option>');
                }
            });
        });
    </script>

    <!-- Dropdown options for brand -->
    <!-- <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_id = $(this).val();
                // alert(category_id);
                if (category_id) {
                    $.ajax({
                        url: 'get_brand.php',
                        type: 'POST',
                        data: {
                            category_id: category_id
                        },
                        success: function(html) {
                            // alert(html);
                            $('#brand').html(html);
                        }
                    });
                } else {
                    $('#brand').html('<option value="">Select a Brand</option>');
                }
            });
        });
        </script> -->

    <!-- Dropdown options for product -->
    <script>
        $(document).ready(function() {
            $('#subcategory').on('change', function() {
                var subcategory_id = $(this).val();
                // alert(subcategory_id);
                if (subcategory_id) {
                    $.ajax({
                        url: 'get_product.php',
                        type: 'POST',
                        data: {
                            subcategory_id: subcategory_id
                        },
                        success: function(html) {
                            // alert(html);
                            $('#product').html(html);
                        }
                    });
                } else {
                    $('#product').html('<option value="">No Product Avialable</option>');
                }
            });
        });
    </script>
    <script src="assets/js/main.js"></script>

</body>

</html>