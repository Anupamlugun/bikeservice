<?php
require("../includes/database_connect.php");
$cancel_id = $_POST['cancel_id'];
$date = date("Y.m.d");

$sql = "UPDATE `orders` SET `order_status` = 'Order Cancelled', `order_cancelled_date` = '$date' WHERE `shope_id` = $cancel_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo ("SQL went wrong");
    return;
}
$sql2 = "SELECT * FROM orders WHERE shope_id = $cancel_id";
$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    echo ("SQL2 went wrong");
    return;
}
$row = mysqli_fetch_assoc($result2);
$order_date = $row['order_date'];
?>

<h6 style="text-align: center;">Order Status:</h6>
<div class="order-status" style="display: flex; border: none rgb(235, 255, 14); justify-content: space-between;">
    <div style="color: green">Order Confirmed</div>
    <div style="color: red">Order Cancelled</div>


</div>
<div class="status" style="display: flex; border: none; align-items: center;">
    <div class="circle" style="background-color: green"></div>
    <div class="line" style="background-color: red"></div>
    <div class="line" style="background-color: red"></div>
    <div class="circle" style="background-color: red"></div>
</div>
<div class="order-date" style="display: flex; border: none rgb(235, 255, 14); justify-content: space-between;">
    <div><?php echo($order_date);?></div>
    <div><?php echo($date);?></div>
</div><br>