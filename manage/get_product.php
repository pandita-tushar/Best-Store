<?php
// Connect to the database
include 'inc/connect.php';

$subcategory_id = $_POST['subcategory_id'];

// Fetch the Product from the database
$sql = "SELECT * FROM product_master WHERE product_sub_category = '$subcategory_id'";
$rs = mysqli_query($conn,$sql);
// echo $sql;
// exit;
$options = '<option value="">Select a Product</option>';
while($row = mysqli_fetch_array($rs)){
    $options .= "<option value='" . $row['pid'] . "'>" . $row['p_name'] . "</option>";
}

// // Build the subcategory options
// $options = '<option value="">Select a subcategory</option>';
// foreach ($sub_category as $subcategory) {
//     $options .= "<option value='" . $subcategory['sc_id'] . "'>" . $subcategory['s_name'] . "</option>";
// }

// Return the subcategory options
echo $options;
?>