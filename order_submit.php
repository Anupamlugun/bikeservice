<?php
session_start();
require("includes/database_connect.php");
//error_reporting(0);
$date = date("Y.m.d");
$text = $_POST['text'];
$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$state = $_POST['state'];
$city = $_POST['city'];
$your_area = $_POST['your_area'];
$pincode = $_POST['pincode'];
$road_name = $_POST['road_name'];
$location = $state . ", " . $city . ", " . $your_area . ", " . $pincode . ", " . $road_name;
$price = "Due";
$order_status = "Order Confirmed";
if(!preg_match("/^[a-zA-Z-' ]*$/", $text)){
    echo("not matched");
    header("location: index.php");
    return false;
}

$sql3 = "SELECT * FROM cities where city ='$city'";
$result3 = mysqli_query($conn, $sql3);
if (!$row_num = mysqli_num_rows($result3)) {
    echo ("Service not available in this city or correct your spelling");
    header("location: index.php");
    return false;
}
$row = mysqli_fetch_assoc($result3);
$city_id = $row['id'];

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
    echo ($user_id);
}
$sql2 = "SELECT * FROM orders ORDER BY shope_id DESC";
$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    echo ('SQL2 went wrong');
}
if (!$row_count = mysqli_num_rows($result2)) {
    echo ($row_count);
    $shope_id = "1";
    if (isset($_POST['check_data'])) {
        $check_data = $_POST['check_data'];
        foreach ($check_data as $data) {
            $sql = "INSERT INTO orders (shope_id, customer_id, service_type_id, description, full_name, phone, location, price, order_status, order_date, city) VALUES ('$shope_id', '$user_id', '$data', '$text', '$full_name', '$phone', '$location', '$price', '$order_status', '$date', '$city_id')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo ('SQL went wrong');
            }
        }
    } else {
        $data = "9";
        $sql = "INSERT INTO orders (shope_id, customer_id, service_type_id, description, full_name, phone, location, price, order_status, order_date, city) VALUES ('$shope_id', '$user_id', '$data', '$text', '$full_name', '$phone', '$location', '$price', '$order_status', '$date', '$city_id')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo ('SQL went wrong');
        }
    }
} else {
    $row = mysqli_fetch_assoc($result2);
    $shope_id = $row['shope_id'];
    $shope_id++;
    echo ($shope_id);
    if (isset($_POST['check_data'])) {
        $check_data = $_POST['check_data'];
        foreach ($check_data as $data) {
            $sql = "INSERT INTO orders (shope_id, customer_id, service_type_id, description, full_name, phone, location, price, order_status, order_date, city) VALUES ('$shope_id', '$user_id', '$data', '$text', '$full_name', '$phone', '$location', '$price', '$order_status', '$date', '$city_id')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo ('SQL went wrong');
            }
        }
    } else {
        $data = "9";
        $sql = "INSERT INTO orders (shope_id, customer_id, service_type_id, description, full_name, phone, location, price, order_status, order_date, city) VALUES ('$shope_id', '$user_id', '$data', '$text', '$full_name', '$phone', '$location', '$price', '$order_status', '$date', '$city_id')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo ('SQL went wrong');
        }
    }
}

mysqli_close($conn);
$_SESSION['succes'] = "Order Succesfully completed";
header("location: myorder.php");