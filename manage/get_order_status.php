<?php
// Connect to the database
// $conn = mysqli_connect("localhost", "username", "password", "database_name");
include 'inc/connect.php';

// Get the ID and value from the AJAX request
$oid = $_GET['oid'];
$status = $_GET['status'];


// Update the SQL table with the selected status
$sql = "UPDATE orders SET order_status ='$status' WHERE oid= '$oid'";
mysqli_query($conn, $sql);

// Send a response back to the client
// echo "Selected fruit updated to: " . $status;


// Close the database connection
// mysqli_close($conn);
?>