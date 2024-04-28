<?php
session_start();
require("../includes/database_connect.php");
if (isset($_SESSION["mechanic_id"])) {
    $user_id = $_SESSION['mechanic_id'];
}
$sql = "DELETE FROM mechanics WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("Something went wrong!");
    return;
}
session_destroy();