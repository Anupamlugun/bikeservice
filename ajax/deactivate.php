<?php
session_start();
require("../includes/database_connect.php");
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
}
$sql = "DELETE FROM customer WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("Something went wrong!");
    return;
}
session_destroy();