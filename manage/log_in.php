<?php
session_start();
include 'inc/connect.php';
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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



  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Admin</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your mail ID & password to login</p>
                </div>

                <form class="row g-3 " method="post">

                  <div class="col-12">
                    <div class="form-floating mb-4 mt-3">
                      <input type="email" class="form-control" placeholder="Enter email" name="mail">
                      <label for="mail">Email</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                      <input type="password" class="form-control" placeholder="Enter password" name="pswd">
                      <label for="pswd">Password</label>


                      <div class="col-12 mt-3">
                        <button class="btn btn-primary w-100" type="submit" name="submit">Login</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                      </div>
                      <div align="center">
                        <p class="small mb-0"> <a href="log_in.php">Login as User!</a> </p>
                      </div>
                </form>

              </div>
            </div>



          </div>
        </div>
      </div>

    </section>

  </div>

  <!-- End #main -->
  <?php
  if (isset($_POST['submit'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pswd'];

    $sql = "SELECT * FROM  admin WHERE mail='$mail' and password='$pass'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    $cnt = mysqli_num_rows($rs);

    if ($cnt > 0) {
      $_SESSION['adminID'] = $row['aid'];
      $_SESSION['adminName'] = $row['name'];
      header("location:index.php");
    } else {

      echo "error";
    }
  }

  ?>





</body>

</html>