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
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Master Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='index.php'>Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="admin-manage.php">Manage</a></li>-->
                    <li class="breadcrumb-item active">Master Orders</li>
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
                                                    <th scope="col">Master Order ID</th>
                                                    <th scope="col">User ID</th>
                                                    <th scope="col">Orders</th>
                                                    <th scope="col">Total Cost</th>
                                                    <th scope="col">Address</th>
                                                </tr>
                                            </thead>


                                            <?php
                                            $itemsPerPage = 10;
                                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $start = ($page - 1) * $itemsPerPage;
                                            // Query to fetch total number of items
                                            $totalQuery = "SELECT COUNT(*) as total FROM master_order LEFT JOIN user ON user.uid = master_order.u_id";
                                            $totalResult = mysqli_query($conn, $totalQuery);
                                            $totalRows = mysqli_fetch_assoc($totalResult)['total'];

                                            // Calculate total number of pages
                                            $totalPages = ceil($totalRows / $itemsPerPage);
                                            if (isset($_POST['submit'])) {
                                                $search = mysqli_escape_string($conn, $_POST['search']);
                                                $sql = "select * from master_order where u_id LIKE '%$search%' or total_cost LIKE '%$search%' or master_oid LIKE '%$search%'";
                                            } else {
                                                $sql = "SELECT * FROM master_order LEFT JOIN user ON user.uid = master_order.u_id ORDER BY master_oid DESC LIMIT $start,$itemsPerPage";
                                            }
                                            
                                            $rs = mysqli_query($conn, $sql);
                                            $i = $start + 1;
                                            while ($row = mysqli_fetch_array($rs)) {
                                                $m_oid = $row['master_oid'];
                                                $add = $row['address'];
                                                $query = "SELECT * FROM user_address_book WHERE u_aid = '$add'";
                                                $result = mysqli_fetch_array(mysqli_query($conn, $query));

                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?php echo $i; ?></th>
                                                        <td><?php echo $row['master_oid']; ?></td>
                                                        <td><?php echo $row['u_name']; ?></td>
                                                        <td><a href=<?php echo "manage_orders.php?m_oid=$m_oid"; ?>><img src="assets/img/view.png" height="25" alt=""></a></td>
                                                        <td><?php echo $row['total_cost']; ?></td>
                                                        <td><?php echo $result['address']; ?></td>
                                                    </tr>




                                                <?php
                                                $i++;
                                            }
                                                ?>
                                                </tbody>
                                        </table>
                                        <div>
                                            
                                                <?php
                                                echo "<ul class='pagination'>";
                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                   ?><button><?php echo "<li><a href='?page=$i'>$i</a></li>";echo "</button>&nbsp";
                                                }
                                                echo "</ul>";
                                                ?>
                                            
                                        </div>
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


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>