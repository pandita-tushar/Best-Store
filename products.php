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
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<!--// breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Categories</h3>
					<?php
					$sqla = "SELECT * FROM category WHERE status = '1' ";
					$rsa = mysqli_query($conn, $sqla);
					while ($rowa = mysqli_fetch_array($rsa)) {

						$cat_id = $rowa['cat_id'];
						$sqlb = "SELECT * FROM sub_category WHERE cat_id = $cat_id AND s_status = '1'";
						$rsb = mysqli_query($conn, $sqlb);
						$sqlc = "SELECT count(*) AS cnt FROM sub_category WHERE cat_id = $cat_id AND s_status = '1'";
						$rsc = mysqli_query($conn, $sqlc);
						$rowc = mysqli_fetch_array($rsc)
					?>
						<ul class="cate">
							<li><b><?php echo $rowa['name']; ?></b> <span><?php echo $rowc['cnt']; ?></span></li>
							<?php
							while ($rowb = mysqli_fetch_array($rsb)) {
								$subcat_id = $rowb['sc_id'];
							?>
								<ul>
									<li><a href=<?php echo "products.php?subcat_id=$subcat_id&cat_id=$cat_id"; ?>><?php echo $rowb['s_name']; ?></a></li>
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

					$sql = "SELECT * FROM product_master WHERE p_status = '1'  ORDER BY code DESC LIMIT 3";
					$rs = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($rs)) {
						// $subcat_id = $row['product_sub_category'];
						$pid = $row['pid'];
						$cat_id = $row['product_category'];

					?>
						<div class="new-products-grids">
							<div class="new-products-grid">
								<div class="new-products-grid-left">
									<a href="<?php echo "quick-view.php?pid=$pid&cat_id=$cat_id"; ?>"><img src="manage/uploads/<?php echo $row['pic2']; ?>" alt=" " class="img-responsive" /></a>
								</div>

								<div class="new-products-grid-right">
									<h4><a href=""><?php echo $row['p_name']; ?></a></h4>
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
									<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
										<p> <span class="item_price">₹<?php echo $row['cost']; ?></span><a class="item_add" href="#">add to cart </a></p>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					<?php
					}
					?>

				</div>
				<div class="men-position animated wow slideInUp" data-wow-delay=".5s">
					<a href=""><img src="images/27.jpg" alt=" " class="img-responsive" /></a>
					<div class="men-position-pos">
						<h4>Summer collection</h4>
						<h5><span>55%</span>Discount</h5>
					</div>
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
					$cat_id = $_GET['cat_id'];
					if ($cat_id == 8) {
					?>
						<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
							<img src="images/display.avif" alt="cant find image" class="img-responsive" />
							<div class="products-right-grids-position1">
								<h4>2023 New Collections</h4>
								<p>Brand new products with shocking discounts.</p>
							</div>
						</div>
					<?php
					}
					if ($cat_id == 9) {
					?>
						<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
							<img src="images/18.jpg" alt="cant find image" class="img-responsive" />
							<div class="products-right-grids-position1">
								<h4>2023 New Collections</h4>
								<p>Brand new products with shocking discounts.</p>
							</div>
						</div>
					<?php
					}
					if ($cat_id == 10) {
					?>
						<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
							<img src="images/shoe.jpg" alt="cant find image" class="img-responsive" />
							<div class="products-right-grids-position1">
								<h4>2023 New Collections</h4>
								<p>Brand new products with shocking discounts.</p>
							</div>
						</div>
					<?php
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



					$subcat_id = $_GET['subcat_id'];
					$sql = "SELECT * FROM product_master WHERE product_sub_category = $subcat_id AND p_status = '1'";
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
					?>
					<div class="clearfix"> </div>
					<?php
					// generate Pagination links
					echo "<ul class='pagination'>";
					echo "<button>";
					for ($i = 1; $i <= $totalPages; $i++) {
						echo "<li><a href='?cat_id=$cat_id&subcat_id=$subcat_id&page=$i'>$i</a></li>";
					}
					echo "</button>";
					echo "</ul>";
					?>
					<!-- <nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
						<ul class="pagination paging">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav> -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!-- !!footer -->
	<?php include 'footer.php'; ?>
	<!-- footer -->
</body>

</html>