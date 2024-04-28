<?php
require("includes/database_connect.php");

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = sha1($password);

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

$sql = "INSERT INTO customer (full_name, phone, email, password) VALUES ('$full_name', '$phone', '$email', '$password')";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("Something went wrong!");
    return;
}
echo("Your account has been created successfully!");
header("location: index.php");
mysqli_close($conn);
