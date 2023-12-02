<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_commerce";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
    die("connection failed: ".  mysqli_connect_error());
}

function gotopage($url)
{
  echo "<script language=\"javascript\">";
  echo "window.location = '".$url."'; \n";
  echo "</script>";
}
?>