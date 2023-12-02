<?php
include 'inc/security.php';
include 'inc/connect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>
                  <?php
                  $sql = "SELECT * FROM orders WHERE o_date = CURDATE() AND order_status != 'Cancelled'";
                  $rs = mysqli_query($conn, $sql);
                  $t_sales = 0;
                  while ($res = mysqli_fetch_array($rs)) {
                    $t_sales += $res['p_qty'];
                  }
                  ?>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $t_sales; ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <!-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a> -->

                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>
                  <?php
                  $sql = "SELECT * FROM orders WHERE MONTH(o_date) = MONTH(now()) AND order_status != 'Cancelled'";
                  $rs = mysqli_query($conn, $sql);
                  $t_rev = 0;
                  while ($res = mysqli_fetch_array($rs)) {
                    $t_rev += $res['o_cost'];
                  }
                  ?>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>₹ <?php echo $t_rev; ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>
                  <?php
                  $sql = "SELECT *,COUNT(*) as cnt FROM user ";
                  $rs = mysqli_query($conn, $sql);
                  $res = mysqli_fetch_array($rs);
                  ?>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $res['cnt']; ?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM user LEFT JOIN orders ON user.uid = orders.uid WHERE orders.o_date = CURDATE() AND  orders.order_status != 'Cancelled'";
                      $rs = mysqli_query($conn, $sql);
                      while ($results = mysqli_fetch_array($rs)) {
                        $id = $results['uid'];
                        $pid = $results['pid'];
                        $query = "SELECT * FROM orders INNER JOIN product_master ON orders.pid = product_master.pid WHERE orders.uid = '$id' AND order_status != 'Cancelled' AND product_master.pid = '$pid'";
                        $rsa = mysqli_query($conn, $query);
                        $res = mysqli_fetch_array($rsa);
                      ?>
                        <tr>
                          <th scope="row"><a href="#"><?php echo $results['uid']; ?></a></th>
                          <td><?php echo $results['u_name']; ?></td>
                          <td><a href="#" class="text-primary"></a><?php echo $res['p_name']; ?></td>
                          <td><?php echo $res['cost']; ?></td>
                          <td>
                            <?php
                            if ($res['order_status'] == 'Accepted') {
                            ?>
                              <span class="badge bg-success"><?php echo $res['order_status']; ?></span>
                            <?php
                            }
                            if ($res['order_status'] == 'In Progress') {
                            ?>
                              <span class="badge bg-warning"><?php echo $res['order_status']; ?></span>
                            <?php
                            }
                            if ($res['order_status'] == 'Shipped') {
                            ?>
                              <span class="badge bg-danger"><?php echo $res['order_status']; ?></span>
                            <?php
                            }
                            if ($res['order_status'] == 'Delivered') {
                            ?>
                              <span class="badge bg-primary"><?php echo $res['order_status']; ?></span>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <!-- <th scope="col">Revenue</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM orders LEFT JOIN product_master ON orders.pid = product_master.pid WHERE orders.o_date = CURDATE() ORDER BY p_qty DESC LIMIT 10";
                      $rs = mysqli_query($conn, $sql);
                      while ($res = mysqli_fetch_array($rs)) {
                      ?>
                        <tr>
                          <th scope="row"><a href="#"><img src="uploads/<?php echo $res['pic1']; ?>" alt=""></a></th>
                          <td><a href="#" class="text-primary fw-bold"><?php echo $res['p_name']; ?></a></td>
                          <td><?php echo $res['cost']; ?></td>
                          <td class="fw-bold"><?php echo $res['p_qty']; ?></td>
                          <!-- <td>$5,828</td> -->
                        </tr>
                      <?php
                      }
                      ?>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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