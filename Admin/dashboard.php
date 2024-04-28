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
    } else {
        $row = mysqli_fetch_assoc($result);
        $pic = $row["pic"];
        $full_name = $row["full_name"];
        $phone = $row["phone"];
        $email = $row["email"];
    }

    $sql2 = "SELECT * FROM orders";
    $result2 = mysqli_query($conn, $sql2);
    if (!$result2) {
        echo ("SQL2 went wrong");
        return;
    } else {
        $row = mysqli_num_rows($result2);
    }

    $sql3 = "SELECT * FROM recruitment";
    $result3 = mysqli_query($conn, $sql3);
    if (!$result3) {
        echo ("SQL3 went wrong");
        return;
    } else {
        $row_recruitment = mysqli_num_rows($result3);
    }

    $sql4 = "SELECT * FROM mechanics";
    $result4 = mysqli_query($conn, $sql4);
    if (!$result4) {
        echo ("SQL4 went wrong");
        return;
    } else {
        $row_mechanics = mysqli_num_rows($result4);
    }

    $sql5 = "SELECT * FROM `orders` ORDER BY `orders`.`price_amount` DESC";
    $result5 = mysqli_query($conn, $sql5);
    if (!$result5) {
        echo ("SQL5 went wrong");
        return;
    } else {
        $total_price = 0;
        $last_price = 0;
        $minus = 0;
        while ($row_5 = mysqli_fetch_assoc($result5)) {
            $price = $row_5['price_amount'];
            if ($price == $last_price) {
                $minus = $minus + $last_price;
            }
            $last_price = $price;
            $total_price = $total_price + $price;
            $all_total_price = $total_price - $minus;
        }
        //echo $all_total_price;

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

    <link rel="stylesheet" href="css/dashboard.css">
    <title>dashboard</title>
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/bike.jpg");
            background-size: cover;
            background-attachment: fixed;

        }
    </style>
</head>

<body class="body">
    <!-- navbar -->
    <?php
    include 'includes/navbar.php';
    ?>

    <div class="container">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="profile">
                <div class="col profile-icon"><img src="img/<?php echo ($pic); ?>" class="card-img-top" alt="..."></div>
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
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container testc">
            <div class="row" id="card_row" style="justify-content:space-between;">
                <a class="col-12 col-md-2 card"
                    style="background-color: #adc5f9; text-decoration: none; cursor: pointer; color:black">
                    <div class="row" style="display: flex;">
                        <div class="col" style="display: flex;"> <i class="fa-solid fa-chart-line"> <b>Total
                                    Profit</b></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">&#8377;
                            <?php echo ($all_total_price); ?>
                        </div>
                        <div class="col"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    </div>
                </a>
                <a href="Service_detail.php" class="col-12 col-md-2 card"
                    style="background-color: #b6fc1e; text-decoration: none; cursor: pointer; color:black">
                    <div class="row">
                        <div class="col" style="display: flex;"><i class="fa-solid fa-folder-plus"> <b>Total
                                    Services</b></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php echo ($row); ?>
                        </div>
                        <div class="col"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    </div>
                </a>
                <a href="Recruitment.php" class="col-12 col-md-2 card"
                    style="background-color: #e66af4; text-decoration: none; cursor: pointer; color:black">
                    <div class="row">
                        <div class="col" style="display: flex;"><i class="fa-solid fa-user"> <b>Total
                                    Applicants</b></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php echo ($row_recruitment); ?>
                        </div>
                        <div class="col"><i class="fa-solid fa-arrow-trend-down"></i></div>
                    </div>
                </a>
                <a href="employee-detail.php" class="col-12 col-md-2 card"
                    style="background-color: #f49f67; text-decoration: none; cursor: pointer; color:black">
                    <div class="row">
                        <div class="col" style="display: flex;"><i class="fa-solid fa-user-pen"> <b>Total
                                    Employees</b></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php echo ($row_mechanics); ?>
                        </div>
                        <div class="col"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    </div>
                </a>
            </div>

        </div>

</body>

</html>