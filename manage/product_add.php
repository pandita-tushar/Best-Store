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
                                $product_brand = $_POST['product-brand'];
                                $product_category = $_POST['product-category'];
                                $product_sub_category = $_POST['product-sub-category'];
                                $product_name = $_POST['product-name'];
                                $product_details = $_POST['product-details'];
                                $product_code = $_POST['product-code'];
                                $product_cost = $_POST['product-cost'];
                                $product_status = '1';
                                // Upload images
                                $target_dir = "uploads/";
                                $target_file = $target_dir . basename($_FILES["pic1"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $pic1_name = $product_name. "." . $imageFileType;
                                if($target_file = $target_dir .$pic1_name){

                                if (move_uploaded_file($_FILES["pic1"]["tmp_name"], $target_file)) {
                                    $msg = "Files uploaded successfully";
                                    $url = "product_manage.php?msg=$msg";
                                    // echo "<div class='alert alert-success'>File uploaded successfully.</div>";
                                   
                                  } 
                                $target_dir = "uploads/";
                                $target_file = $target_dir . basename($_FILES["pic2"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                }

                                $pic2_name = $product_name. "2." . $imageFileType;
                                if($target_file = $target_dir .$pic2_name){

                                if (move_uploaded_file($_FILES["pic2"]["tmp_name"], $target_file)) {
                                    $msg = "Files uploaded successfully";
                                    $url = "product_manage.php?msg=$msg";
                                    // echo "<div class='alert alert-success'>File uploaded successfully.</div>";
                                   
                                  } 
                                $target_dir = "uploads/";
                                $target_file = $target_dir . basename($_FILES["pic3"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                }

                                $pic3_name = $product_name. "3." . $imageFileType;
                                if($target_file = $target_dir .$pic3_name){

                                if (move_uploaded_file($_FILES["pic3"]["tmp_name"], $target_file)) {
                                    $msg = "Files uploaded successfully";
                                    $url = "product_manage.php?msg=$msg";
                                    // echo "<div class='alert alert-success'>File uploaded successfully.</div>";
                                   
                                  } 
                                }



                                $sql = "INSERT INTO product_master (product_brand, p_name, detail, product_category, product_sub_category, code, cost,  p_status, pic1, pic2, pic3) VALUES ('$product_brand', '$product_name', '$product_details', '$product_category', '$product_sub_category', '$product_code', '$product_cost', '$product_status', '$pic1_name', '$pic2_name', '$pic3_name' )";

                                if (mysqli_query($conn, $sql)) {
                                    $msg = "Record created successfully";
                                    $url = "product_manage.php?msg=$msg";
                                    gotopage($url);
                                } else {
                                    $msg = "Sorry, there was some problem";
                                    $url = "product_manage.php?msg=$msg";
                                    gotopage($url);
                                }
                            } else {
                            ?>
                                <form action="" method="post" enctype="multipart/form-data" >

                                    <div class="row">

                                        <div class="col-md-4 mt-3 mb-3">
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
                                        <div class="col-md-4 mt-3 mb-3">
                                            <label for="" class="form-label">Product Sub-Category</label>
                                            <select name="product-sub-category" id="subcategory" class="form-select" required>
                                                <option selected value="">Choose...</option>

                                            </select>

                                        </div>
                                        <div class="col-4 mt-3 mb-3">
                                            <label for="" class="form-label">Product Brand</label>
                                            <select name="product-brand" id="brand" class="form-select" required>
                                                <option selected value="">Choose...</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-3 mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="product-name">
                                        </div>

                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Code</label>
                                            <input type="text" class="form-control" name="product-code">
                                        </div>


                                        <div class="col-md-3 mt-3 mb-3">
                                            <label for="" class="form-label">Cost</label>
                                            <input type="text" class="form-control" name="product-cost">
                                        </div>
                                        
                                        
                                        <div class="col-md-12 mt-3 mb-3" >
                                            <label for="" class="form-label">Details</label>
                                            <textarea name="product-details" id="" cols="30" class="form-control "  rows="5"></textarea>
                                        </div>
                                        <div class="  col-md-4 mt-3 mb-3 " >
                                            <label for="">Image 1</label>
                                            <input type="file" name="pic1" id="pic1">
                                        </div>
                                        <div class="  col-md-4 mt-3 mb-3 " >
                                            <label for="">Image 2</label>
                                            <input type="file" name="pic2" id="pic2">
                                        </div>
                                        <div class="  col-md-4 mt-3 mb-3 " >
                                            <label for="">Image 3</label>
                                            <input type="file" name="pic3" id="pic3">
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
        <script>
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
        </script>
        <script src="assets/js/main.js"></script>

</body>

</html>