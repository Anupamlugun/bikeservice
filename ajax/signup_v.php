<?php
require("../includes/database_connect.php");
$email = $_POST['email'];

$sql = "SELECT * FROM customer WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("sql went wrong");
    return;
}

$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
    echo("This email id is already registered with us!");
    return;
}