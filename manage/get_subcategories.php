<?php
// Connect to the database
include 'inc/connect.php';
// $pdo = new PDO("mysql:host=localhost;dbname=e_commerce", "root", "");

// Get the category ID from the POST data
$category_id = $_POST['category_id'];

// Fetch the subcategories from the database
$sql = "SELECT * FROM sub_category WHERE cat_id = '$category_id'";
$rs = mysqli_query($conn,$sql);
// echo $sql;
// exit;
$options = '<option value="">Select a subcategory</option>';
while($row = mysqli_fetch_array($rs)){
    $options .= "<option value='" . $row['sc_id'] . "'>" . $row['s_name'] . "</option>";
}

// // Build the subcategory options
// $options = '<option value="">Select a subcategory</option>';
// foreach ($sub_category as $subcategory) {
//     $options .= "<option value='" . $subcategory['sc_id'] . "'>" . $subcategory['s_name'] . "</option>";
// }

// Return the subcategory options
echo $options;
?>