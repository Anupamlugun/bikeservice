<?php
require("../includes/database_connect.php");
$city_name = $_POST['city_name'];
//echo($city_name);
$sql = "SELECT * FROM cities where city = '$city_name'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo ("SQL went wrong");
    return;
}
$rowcount = mysqli_num_rows($result);
if (!$rowcount) {
    echo ("Service not available in this city or correct your spelling");

}