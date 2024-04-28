<?php
session_start();
require("includes/database_connect.php");

if (isset($_SESSION["admin_id"])) {
    $user_id = $_SESSION['admin_id'];

    $sql = "SELECT * FROM admin where id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo ("SQL went wrong");
        return;
    }
} else {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include 'includes/head-links.php';
    ?>
    <link rel="stylesheet" href="css_mody/employee.css">
    <title>Employee Details</title>
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/bike.jpg");
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php
    include 'includes/navbar.php';
    ?>

    <!-- employees -->
    <center>
        <h1><b style="color: #75ff09;">EMPLOYEES</b></h1>
    </center>


    <div class="container-flude">
        <div class="container">
            <?php
            $sql_all = "SELECT * FROM mechanics";
            $result_all = mysqli_query($conn, $sql_all);
            if (!$result_all) {
                echo ("SQL went wrong");
            }
            $rowcount_all = mysqli_num_rows($result_all);

            if ($rowcount_all != 0) {

                $sql2 = "SELECT * FROM mechanics";
                $result2 = mysqli_query($conn, $sql2);
                if (!$result2) {
                    echo ("SQL2 went wrong");
                }

                if ($row_count2 = mysqli_num_rows($result2)) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $applicant_id = $row2["id"];
                        $full_name = $row2["full_name"];
                        $phone = $row2["phone"];
                        $email = $row2["email"];
                        $city = $row2["city"];
                        ?>

                        <div class="container">
                            <div class="row" style="display: flex; justify-content: center;">
                                <div class="profile">
                                    <div class="col profile-icon"><i class="fas fa-size fa-user" aria-hidden="true"></i></div>
                                    <br>
                                    <div class="info">
                                        <div class="info-d user_details">
                                            <span><b>Full Name:</b>
                                                <?php echo ($full_name); ?>
                                            </span><br>
                                            <span><b>Phone No:</b>
                                                <?php echo ($phone); ?>
                                            </span><br>
                                            <span><b>Email ID:</b>
                                                <?php echo ($email); ?>
                                            </span><br>
                                            <span><b>Workshope city:</b>
                                                <?php echo ($city); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                    }
                }
            }

            ?>

                <!-- <div class="order-l pt-5">
                <div>
                    <div class="myorder-list">
                        <h5 style="text-align: center; background-color: red; color: white;">INACTIVE</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>TULSI SAHU</h5>
                                <div class="col" style="    display: flex;
                    justify-content: center;
                    align-items: center;">

                                    <i class="fa-solid fa-circle-user fa-10x" style="height: 100%;"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5> EMPLOYEE DETAILS</h5>
                                <div id="detailsss">Name : Tusli sahu<br>
                                    Phone : 8210034833<br>
                                    Email : tulsikumar835210@gmail.com<br>
                                    Workshope City Name: Ranchi </div>
                            </div>
                            <div class="col-md-4">
                                <h5>TOTAL SERVICE</h5>
                                <div class="customer_name" style="display: flex; justify-content: space-around;">
                                    <h3>50</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            </div>
        </div>
</body>

</html>