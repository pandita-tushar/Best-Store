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

    <style>
        .info-icon {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .info-icon .info-content {
            display: none;
            position: absolute;
            top: 20px;
            left: 0;
            width: 200px;
            background-color: #73b6f5;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            z-index: 999;
            /* Ensure the tooltip is displayed above other elements */
        }

        .info-icon:hover .info-content {
            display: block;
        }
    </style>

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
                    $m_oid = $_GET['m_oid'];
                    ?>
            <h1>Manage Orders: Master ID <?php echo $m_oid; ?> </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='index.php'>Home</a></li>
                    <li class="breadcrumb-item"><a href="master_orders.php">Master od</a></li>
                    <li class="breadcrumb-item active">Manage Orders</li>
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
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Order No</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Transaction ID</th>
                                                    <th scope="col">Payment Sts</th>
                                                    <th scope="col">Cost</th>
                                                    <th scope="col">Cancel Req</th>
                                                    <th scope="col">Order Sts</th>
                                                    <!-- <th scope="col">Action</th> -->
                                                </tr>
                                            </thead>


                                            <?php
                                            if (isset($_POST['submit'])) {
                                                $m_oid = $_GET['m_oid'];
                                                $search = mysqli_escape_string($conn, $_POST['search']);
                                                    $sql = "SELECT * from orders LEFT JOIN payment ON orders.oid = payment.o_id LEFT JOIN rejected_orders ON rejected_orders.r_oid = orders.oid WHERE master_id = '$m_oid' ORDER BY orders.oid AND order_status LIKE '%$search%' or p_qty LIKE '%$search%' or uid LIKE '%$search%' or transaction_id LIKE '%$search%' or master_id LIKE '%$search%'";
                                            } else {
                                                $m_oid = $_GET['m_oid'];
                                                $sql = "SELECT * FROM orders LEFT JOIN payment ON orders.oid = payment.o_id LEFT JOIN rejected_orders ON rejected_orders.r_oid = orders.oid LEFT JOIN product_master ON product_master.pid = orders.pid LEFT JOIN user ON user.uid = orders.uid WHERE master_id = '$m_oid' ORDER BY orders.oid";
                                            }
                                            $rs = mysqli_query($conn, $sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($rs)) {
                                                $oid = $row['oid'];
                                                $rejected = $row['r_oid'];

                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?php echo $i; ?></th>
                                                        <td><?php echo $row['oid']; ?></td>
                                                        <td><?php echo $row['u_name']; ?></td>
                                                        <td><?php echo $row['p_name']; ?></td>
                                                        <td><?php echo $row['transaction_id']; ?></td>
                                                        <td>
                                                            <?php
                                                            if($row['payment_status'] == "1"){
                                                                echo "Paid";
                                                            }else{
                                                                echo "Unpaid";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row['o_cost']; ?></td>
                                                        <td><?php if ($rejected == "") {
                                                                echo "NIL";
                                                            } else {
                                                            ?>
                                                                <div class="info-icon">
                                                                    <img src="assets/img/view-icon.jpg" alt="m" height="18" width="25">
                                                                    <div class="info-content">
                                                                        <?php echo $row['reason']; ?>
                                                                        <!-- This is some information to display when hovering over the icon. -->
                                                                    </div>
                                                                </div>&nbsp;&nbsp;&nbsp;

                                                                <select onchange="updateRejectStatus(this.value,'<?php echo $row['r_oid']; ?>')">
                                                                    <option selected value="<?php echo $row['approval']; ?>" <?php echo ($row['approval'] == $row['approval'] ? 'selected' : '') ?>><?php echo $row['approval']; ?></option>
                                                                    <?php
                                                                    if ($row['approval'] == 'Pending') {
                                                                    ?>
                                                                        <option value="Approved" <?php echo ($row['approval'] == 'Approved' ? 'selected' : '') ?>>Approved</option>
                                                                        <option value="Denied" <?php echo ($row['approval'] == 'Denied' ? 'selected' : '') ?>>Denied</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <!-- <input type="text" hidden name="oid" id="oid" ['oid']; ?>"> -->
                                                        <form action="" method="post">
                                                            <td>
                                                                <select onchange="updateStatus(this.value,'<?php echo $row['oid']; ?>')">
                                                                    <option selected value="<?php echo $row['order_status']; ?>" <?php echo ($row['order_status'] == $row['order_status'] ? 'selected' : '') ?>><?php echo $row['order_status']; ?></option>
                                                                    <?php
                                                                    if ($row['order_status'] == 'Accepted') {
                                                                    ?>
                                                                        <option value="In Progress" <?php echo ($row['order_status'] == 'In Progress' ? 'selected' : '') ?>>In Progress</option>
                                                                        <option value="Shipped" <?php echo ($row['order_status'] == 'Shipped' ? 'selected' : '') ?>>Shipped</option>
                                                                        <option value="Delivered" <?php echo ($row['order_status'] == 'Delivered' ? 'selected' : '') ?>>Delivered</option>
                                                                    <?php
                                                                    }
                                                                    if ($row['order_status'] == 'In Progress') {
                                                                    ?>
                                                                        <option value="Accepted" <?php echo ($row['order_status'] == 'Accepted' ? 'selected' : '') ?>>Accepted</option>
                                                                        <option value="Shipped" <?php echo ($row['order_status'] == 'Shipped' ? 'selected' : '') ?>>Shipped</option>
                                                                        <option value="Delivered" <?php echo ($row['order_status'] == 'Delivered' ? 'selected' : '') ?>>Delivered</option>
                                                                    <?php
                                                                    }
                                                                    if ($row['order_status'] == 'Shipped') {
                                                                    ?>
                                                                        <option value="Accepted" <?php echo ($row['order_status'] == 'Accepted' ? 'selected' : '') ?>>Accepted</option>
                                                                        <option value="In Progress" <?php echo ($row['order_status'] == 'In Progress' ? 'selected' : '') ?>>In Progress</option>
                                                                        <option value="Delivered" <?php echo ($row['order_status'] == 'Delivered' ? 'selected' : '') ?>>Delivered</option>
                                                                    <?php
                                                                    }
                                                                    if ($row['order_status'] == 'Delivered') {
                                                                    ?>
                                                                        <option value="Accepted" <?php echo ($row['order_status'] == 'Accepted' ? 'selected' : '') ?>>Accepted</option>
                                                                        <option value="In Progress" <?php echo ($row['order_status'] == 'In Progress' ? 'selected' : '') ?>>In Progress</option>
                                                                        <option value="Shipped" <?php echo ($row['order_status'] == 'Shipped' ? 'selected' : '') ?>>Shipped</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>


                                                        </form>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        function updateStatus(status, oid) {
            // Send an AJAX request to the server
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the status in the dropdown menu
                    var select = document.querySelector("select[data-oid='" + oid + "']");
                    select.value = status;
                }
            };
            xmlhttp.open("GET", "get_order_status.php?oid=" + oid + "&status=" + status, true);
            xmlhttp.send();
        }
    </script>

    <script>
        function updateRejectStatus(r_status, r_oid) {
            // Send an AJAX request to the server
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.r_status == 200) {
                    // Update the status in the dropdown menu
                    var select = document.querySelector("select[data-r_oid='" + r_oid + "']");
                    select.value = r_status;
                }
            };
            xmlhttp.open("GET", "get_reject_status.php?r_oid=" + r_oid + "&r_status=" + r_status, true);
            xmlhttp.send();
        }
    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>