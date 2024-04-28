<?php
session_start();
require("includes/database_connect.php");

$phone = $_POST['phone'];
$password = $_POST['password'];
$password = sha1($password);

$sql = "SELECT * FROM customer where phone='$phone' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo ("SQL went wrong");
    return;
}

$rowcount = mysqli_num_rows($result);
if (!$rowcount) {
    echo ("invalid number or password");
    return;
}
$row = mysqli_fetch_assoc($result);
$_SESSION["user_id"] = $row["id"];
header("location: index.php");