<?php
// Connect to the database
// $conn = mysqli_connect("localhost", "username", "password", "database_name");
include 'inc/connect.php';

// Get the ID and value from the AJAX request
$r_oid = $_GET['r_oid'];
$r_status = $_GET['r_status'];


// Update the SQL table with the selected r_status
$sql = "UPDATE rejected_orders SET approval ='$r_status' WHERE r_oid= '$r_oid'";
if (mysqli_query($conn, $sql)) {
    $approval = "SELECT * FROM rejected_orders WHERE r_oid = '$r_oid'";
    $a_rs = mysqli_query($conn, $approval);
    $a_row = mysqli_fetch_array($a_rs);
    if ($a_row['approval'] == 'Denied') {
    } else {
        $query = "UPDATE orders SET order_status = 'Cancelled' WHERE oid = '$r_oid'";
        if (mysqli_query($conn, $query)) {
            $sql = "SELECT * FROM orders LEFT JOIN master_order ON orders.master_id = master_order.master_oid  WHERE oid = '$r_oid'";
            $rs = mysqli_query($conn, $sql);
            $res = mysqli_fetch_array($rs);
            $master_id = $res['master_id'];
            $cost = $res['total_cost'] - $res['o_cost'];
            $query = "UPDATE master_order SET total_cost = $cost WHERE master_oid = '$master_id'";
            mysqli_query($conn, $query);
        }
    }
}

// Send a response back to the client
// echo "Selected fruit updated to: " . $r_status;


// Close the database connection
// mysqli_close($conn);
