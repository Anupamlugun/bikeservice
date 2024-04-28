<?php
require("../includes/database_connect.php");
//echo("rejected");

$aid = $_POST["aid"];

$sql3 = "UPDATE recruitment SET accepted = 'rejected' WHERE id ='$aid';";
$result = mysqli_query($conn, $sql3);
if (!$result) {
    echo("sql3 went wrong");
    return;
}
?>
<h4 style="background-color: red; color: white">Rejected</h4>