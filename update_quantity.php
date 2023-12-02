<?php
// Update quantity in database
include 'inc/connect.php';

if (isset($_POST["cid"]) && isset($_POST["product_qty"])) {
    $cid = mysqli_real_escape_string($conn, $_POST["cid"]);
    $product_qty = mysqli_real_escape_string($conn, $_POST["product_qty"]);

    // Update the quantity in the database
    $sql = "UPDATE cart SET product_qty = $product_qty WHERE cid = $cid";
    mysqli_query($conn, $sql);
    // header("Refresh:0");

}
