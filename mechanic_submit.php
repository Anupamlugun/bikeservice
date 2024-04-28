<?php
require("includes/database_connect.php");

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city_name = $_POST['city_name'];
//echo($full_name.$phone.$email.$Workshope_name.$city_name);

$sql = "INSERT INTO recruitment (full_name, phone, email, workshope_city) VALUES ('$full_name', '$phone', '$email', '$city_name')";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("Something went wrong!");
    return;
}
echo("Applied successfully!");
header("location: index.php");
mysqli_close($conn);
