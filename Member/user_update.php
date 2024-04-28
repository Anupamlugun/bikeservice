<?php
session_start();
if (isset($_SESSION["mechanic_id"])) {
    $user_id = $_SESSION['mechanic_id'];
}
require("includes/database_connect.php");

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "UPDATE `mechanics` SET `full_name` = '$full_name', `phone` = '$phone', `email` = '$email' WHERE `mechanics`.`id` = $user_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("Something went wrong!");
    return;
}
echo("Your account has been updated successfully!");
header("location: myprofile.php");
mysqli_close($conn);