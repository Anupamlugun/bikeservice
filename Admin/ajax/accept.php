<?php
require("../includes/database_connect.php");
//echo("accepetd");

$aid = $_POST["aid"];
$sql = "SELECT * FROM recruitment WHERE id='$aid'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo("sql went wrong");
    return;
}

$row = mysqli_fetch_assoc($result);
$full_name = $row['full_name'];
$phone = $row['phone'];
$email = $row['email'];
$email = $row['email'];
$workshope_city = $row['workshope_city'];

$sql2 = "INSERT INTO mechanics (full_name, phone, email, city, password) VALUES ('$full_name', '$phone', '$email','$workshope_city', '$full_name')";
$result = mysqli_query($conn, $sql2);
if (!$result) {
    echo("sql2 went wrong");
    return;
}

$sql3 = "UPDATE recruitment SET accepted = 'accepted' WHERE id ='$aid';";
$result = mysqli_query($conn, $sql3);
if (!$result) {
    echo("sql3 went wrong");
    return;
}
?>

<h4 style="background-color: green; color: white">Accepted</h4>