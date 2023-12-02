<?php include 'inc/connect.php'; include 'inc/security.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Mail Us :: w3layouts</title>
    
</head>

<body>
    <!-- header -->
    <?php include 'nav-bar.php' ?>
    <?php include 'header.php' ?>
    <!-- //header -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Mail Us</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- mail -->
    <div class="mail animated wow zoomIn" data-wow-delay=".5s">
        <div class="container">
            <h3>Mail Us</h3>
            <p class="est">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <div class="mail-grids">
                <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <form method="post">
                        <input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                        <input type="email" name="mail" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                        <input type="text" name="subject" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
                        <textarea type="text" name="msg" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                        <input type="submit" value="Submit Now">
                    </form>
                </div>
                <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
                    <div class="mail-grid-right1">
                        <img src="images/3.png" alt=" " class="img-responsive" />
                        <h4>Rita Williumson <span>Manager</span></h4>
                        <ul class="phone-mail">
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone: +1234 567 893</li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a href="mailto:info@example.com">info@example.com</a></li>
                        </ul>
                        <ul class="social-icons">
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="g"></a></li>
                            <li><a href="#" class="instagram"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            
        </div>
    </div>
    <!-- //mail -->
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->
</body>

</html>
