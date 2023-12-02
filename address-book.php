<?php include 'inc/connect.php';
include 'inc/security.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>

    
</head>

<body>
    <!-- nav-bar -->
    <?php include 'nav-bar.php' ?>

    <!-- header -->
    <?php include 'header.php' ?>

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Order history</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->


    <!-- Address book -->
    <link rel="stylesheet" href="css/address-table.css">
    <div class="login">
        <div class="container-t">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Address Book</h3>
            <p style="color: red;" class="est"><?php
                                                if (isset($_GET['msg'])) {
                                                    echo $_GET['msg'];
                                                }
                                                ?></p>
        </div>



        <div>
            <a href="address-book-add.php"><button style="float: right; margin-right: 273px;" class="btn btn-primary">Add New</button></a>
        </div>
        <table>
            <thead>
                <th >#</th>
                <th >City</th>
                <th >State</th>
                <th >Address</th>
                <th>Action</th>
            </thead>
            <?php
            $uid = $_SESSION['userID'];
            $sql = "SELECT * FROM user_address_book WHERE u_id = '$uid'";
            $res = mysqli_query($conn, $sql);
            $i = 1;
            while ($row = mysqli_fetch_array($res)) {
                $u_aid = $row['u_aid'];
            ?>
                <!-- Address book -->
                <tbody >
                    <tr>
                        <td><strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo "<a href= address-delete.php?u_aid=$u_aid>"."delete"."</a>"; ?></td>
                    </tr>
                </tbody>
            <?php
                $i++;
            }
            ?>
        </table>
    </div>

        

    <!-- //Address book -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- //Footer -->


</body>

</html>