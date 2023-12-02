<?php
session_start();
if(!isset($_SESSION['adminID'])){
    header("location:log_in.php");
}


