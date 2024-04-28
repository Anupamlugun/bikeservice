<?php
require("../includes/database_connect.php");
$shope_id = $_POST['shope_id'];
$shope_status = $_POST['shope_status'];
$shope_date = $_POST['shope_date'];
$date = date("Y.m.d");

$sql = "UPDATE `orders` SET `order_status` = '$shope_status', `$shope_date` = '$date' WHERE `shope_id` = $shope_id ";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo ("SQL went wrong");
    return;
}