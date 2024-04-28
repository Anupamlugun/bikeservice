<?php
require("../includes/database_connect.php");
$feedback_text = $_POST['feedback_text'];
$order_id = $_POST['order_id'];
$sql = "UPDATE orders SET feedback = '$feedback_text' WHERE shope_id =  $order_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo ("SQL went wrong");
    return;
}
echo("Thank you for your feedback");
?>