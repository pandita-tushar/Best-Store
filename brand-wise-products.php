<?php include 'inc/connect.php';
include 'inc/security.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>

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
                <li class="active">Products (brand wise)</li>
            </ol>
        </div>
    </div>
    <!--// breadcrumbs -->
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Brands</h3>
                    <?php
                    $sqla = "SELECT * FROM category WHERE status = '1' ";
                    $rsa = mysqli_query($conn, $sqla);
                    while ($rowa = mysqli_fetch_array($rsa)) {
                        $cat_id = $rowa['cat_id'];
                        $sqlb = "SELECT * FROM brand WHERE cat_id = $cat_id ";
                        $rsb = mysqli_query($conn, $sqlb);
                        $sqlc = "SELECT count(*) AS cnt FROM brand WHERE cat_id = $cat_id";
                        $rsc = mysqli_query($conn, $sqlc);
                        $rowc = mysqli_fetch_array($rsc)
                    ?>
                        <ul class="cate">
                            <li><b><?php echo $rowa['name']; ?></b> <span><?php echo $rowc['cnt']; ?></span></li>
                            <?php
                            while ($rowb = mysqli_fetch_array($rsb)) {
                                $brand_id = $rowb['b_id'];
                            ?>
                                <ul>
                                    <li><a href=<?php echo "brand-wise-products.php?brand_id=$brand_id"; ?>><?php echo $rowb['b_name']; ?></a></li>
                                </ul>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>New Products</h3>
                    <?php

                    $sql = "SELECT * FROM product_master WHERE p_status = '1'  ORDER BY code DESC LIMIT 3 ";
                    $rs = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($rs)) {
                        $pid = $row['pid'];
                        $cat_id = $row['product_category'];

                    ?>
                        <div class="new-products-grids">
                            <div class="new-products-grid">
                                <div class="new-products-grid-left">
                                    <a href="<?php echo "quick-view.php?pid=$pid&cat_id=$cat_id"; ?>"><img src="manage/uploads/<?php echo $row['pic2']; ?>" alt=" " class="img-responsive" /></a>
                                </div>

                                <div class="new-products-grid-right">
                                    <h4><a href="single.html"><?php echo $row['p_name']; ?></a></h4>
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <form action=<?php echo "add-to-cart.php?pid=$pid"; ?> method="post">
                                        <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                            <p> <span class="item_price">₹<?php echo $row['cost']; ?></span><button class="btn" name="submit-tb">add to cart </button></p>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                </div>
            <?php
                    }

            ?>
            <!-- <div class="clearfix"> </div> -->

            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
                    <div class="sorting">
                        <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null">Default sorting</option>
                            <option value="null">Sort by popularity</option>
                            <option value="null">Sort by average rating</option>
                            <option value="null">Sort by price</option>
                        </select>
                    </div>
                    <div class="sorting-left">
                        <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null">Item on page 9</option>
                            <option value="null">Item on page 18</option>
                            <option value="null">Item on page 32</option>
                            <option value="null">All</option>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <?php
                $brand_id = $_GET['brand_id'];
                $last = "SELECT * FROM brand ORDER BY CAST(b_id AS int) DESC LIMIT 1";
                $rs = mysqli_query($conn, $last);
                $rw = mysqli_fetch_array($rs);
                // echo $rw['b_id'];
                $sql = "SELECT * FROM brand WHERE b_id = '$brand_id' ";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);
                $i = 15;
                while ($i <= $rw['b_id']) {
                    if ($brand_id == $i) {

                ?>
                        <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                            <img src="manage/uploads/<?php echo $row['picture']; ?>" alt="cant find image" class="img-responsive" />
                            <div class="products-right-grids-position1">
                            </div>
                        </div>
                <?php
                        break;
                    }
                    $i++;
                }
                ?>
            </div>

            <div class="products-right-grids-bottom">
                <?php
                // Number of items to display per page
                $itemsPerPage = 10;

                // Current page number
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Calculate the starting item number for the current page
                $start = ($page - 1) * $itemsPerPage;


                // Query to fetch total number of items
                $totalQuery = "SELECT COUNT(*) as total FROM product_master";
                $totalResult = mysqli_query($conn, $totalQuery);
                $totalRows = mysqli_fetch_assoc($totalResult)['total'];
                // Calculate total number of pages
                $totalPages = ceil($totalRows / $itemsPerPage);

                // $subcat_id = $_GET['subcat_id'];
                $sql = "SELECT * FROM product_master WHERE product_brand = '$brand_id' AND p_status = '1' LIMIT $start,$itemsPerPage";
                $rs = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($rs)) {
                    $pid = $row['pid'];
                    $pcat_id = $row['product_category'];
                ?>
                    <div class="col-md-4 products-right-grids-bottom-grid">
                        <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.html" class="product-image"><img src="manage/uploads/<?php echo $row['pic2']; ?>" height="320" width="500" alt=" " class="img-responsive"></a>
                                <div class="new-collections-grid1-image-pos products-right-grids-pos">
                                    <a href=<?php echo "quick-view.php?pid=$pid&pcat_id=$pcat_id"; ?>>Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right products-right-grids-pos-right">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <h4><a href=""><?php echo $row['p_name']; ?></a></h4>
                            <p><?php echo $row['detail']; ?>.</p>
                            <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                <p><i>₹<?php echo $row['cost'] + 1000; ?></i> <span class="item_price">₹<?php echo $row['cost']; ?></span><a class="item_add" href="#">add to cart </a></p>
                            </div>
                        </div>



                    </div>

                <?php
                }
                // generate Pagination links
                echo "<ul class='pagination'>";
                echo "<button>";
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li><a href='?brand_id=$brand_id&page=$i'>$i</a></li>";
                }
                echo "</button>";
                echo "</ul>";
                ?>


                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    </div><br>

    <!-- !!footer -->
    <?php include 'footer.php'; ?>
    <!-- footer -->
</body>

</html>