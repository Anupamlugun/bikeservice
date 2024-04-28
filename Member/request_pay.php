<?php
require("includes/database_connect.php");
$Price = $_POST['Price'];
$shope_id = $_POST['shope_id'];

$sql = "UPDATE orders SET price_amount = $Price where shope_id = $shope_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("Something went wrong!");
    return;
}
echo("Requested!");
header("location: Dashboard.php");
mysqli_close($conn);