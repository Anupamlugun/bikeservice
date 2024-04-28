<?php
session_start();
require("includes/database_connect.php");
if (!isset($_SESSION["mechanic_id"])) {
    header("location: index.php");
    die;
}
$user_id = $_SESSION['mechanic_id'];
//echo($user_id);
$order_id = $_GET['order_id'];
$sql_id = "SELECT * FROM orders where shope_id =$order_id";
$result_id = mysqli_query($conn, $sql_id);
if (!$result_id) {
    echo ("SQL_ID went wrong");
}
if (!$row_count_id = mysqli_num_rows($result_id)) {
    header("location: index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "includes/head_links.php";
    ?>

    <link href="css_mody/Order_details.css" rel="stylesheet" />

    <title>Order Details</title>
</head>

<body>
    <!-- navbar -->
    <?php
    include "includes/navbar.php";
    ?>

    <!-- Order_details -->
    <?php
    $sql = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = $order_id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo ("SQL went wrong");
    }


    $row = mysqli_fetch_assoc($result);

    $shope_id = $row['shope_id'];
    $font = $row['font'];
    $service_type = $row['service_type'];
    $description = $row['description'];
    $full_name = $row['full_name'];
    $phone = $row['phone'];
    $location = $row['location'];
    $price = $row['price'];
    $order_status = $row['order_status'];
    $order_date = $row['order_date'];
    $out_for_service_date = $row['out_for_service_date'];
    $service_completed_date = $row['service_completed_date'];
    $order_cancelled_date = $row['order_cancelled_date'];

    ?>
    <div class="container pb-5 pt-5">
        <h1 style="text-align: center; color:#ffc107;">ORDER DETAILS:
            <?php echo ($shope_id); ?>
        </h1>
        <div class="row">
            <div class="col-sm-12 cardstyle1">

                <h6>Service Type:</h6>
                <div class="serv row" style="display: flex;">
                    <p class="col"><i class="fa-solid <?php echo ($font); ?>"></i>
                        <?php echo ($service_type); ?>
                    </p>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $font = $row['font'];
                        $service_type = $row['service_type'];
                        ?>
                        <p class="col"><i class="fa-solid <?php echo ($font); ?>"></i>
                            <?php echo ($service_type); ?>
                        </p>
                        <?php
                    }
                    ?>
                </div>
                <?php
                if ($description) {
                    ?>
                    <h6>About Service:</h6>
                    <p>
                        <?php echo ($description); ?>
                    </p>
                    <?php
                }
                ?>
                <h6>Order Address:</h6>
                <p>
                    <?php echo ($full_name); ?><br>
                    <?php echo ($phone); ?><br>
                    <?php echo ($location); ?>
                </p>
                <?php
                if ($price != "Paid") {
                    ?>
                    <b>Price:</b> Not Paid
                    <?php
                } else {
                    ?>
                    <b>Price:</b> Paid
                    <?php
                }
                ?>
                <br>

                <h6 style="text-align: center;">Order Status:</h6>
                <div class="order-status"
                    style="display: flex; border: none rgb(235, 255, 14); justify-content: space-between;">
                    <?php
                    if ($order_status == "Order Cancelled") {
                        ?>
                        <div style="color: green">Order Confirmed</div>
                        <div style="color: red">Order Cancelled</div>
                        <?php
                    } else {
                        ?>
                        <div style="color: green">Order Confirmed</div>
                        <div style="color: green">Out For Service</div>
                        <div style="color: green">Service completed</div>
                        <?php
                    }
                    ?>
                </div>
                <div class="status" style="display: flex; border: none green; align-items: center;">
                <?php
                    if ($order_status == "Order Confirmed") {
                        ?>
                        <div class="circle" style="background-color: green"></div>
                        <div class="line" style="background-color: #ffc107"></div>
                        <div class="circle" style="background-color: #ffc107"></div>
                        <div class="line" style="background-color: #ffc107"></div>
                        <div class="circle" style="background-color: #ffc107"></div>
                        <?php
                    } elseif ($order_status == "Out For Service") {
                        ?>
                        <div class="circle" style="background-color: green"></div>
                        <div class="line" style="background-color: green"></div>
                        <div class="circle" style="background-color: green"></div>
                        <div class="line" style="background-color: #ffc107"></div>
                        <div class="circle" style="background-color: #ffc107"></div>
                        <?php
                    } elseif ($order_status == "Service completed") {
                        ?>
                        <div class="circle" style="background-color: green"></div>
                        <div class="line" style="background-color: green"></div>
                        <div class="circle" style="background-color: green"></div>
                        <div class="line" style="background-color: green"></div>
                        <div class="circle" style="background-color: green"></div>
                        <?php
                    } else {
                        ?>
                        <div class="circle" style="background-color: green"></div>
                        <div class="line" style="background-color: red"></div>
                        <div class="line" style="background-color: red"></div>
                        <div class="circle" style="background-color: red"></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="order-date"
                    style="display: flex; border: none rgb(235, 255, 14); justify-content: space-between;">
                    <?php
                    if ($order_status == "Order Confirmed") {
                       ?>
                        <div><?php echo ($order_date); ?></div>
                        <div><?php echo ($order_date); ?></div>
                        <div><?php echo ($order_date); ?></div>
                    <?php
                    } elseif ($order_status == "Out For Service") {
                        ?>
                        <div><?php echo ($order_date); ?></div>
                        <div><?php echo ($out_for_service_date); ?></div>
                        <div><?php echo ($out_for_service_date); ?></div>
                        <?php
                    } elseif ($order_status == "Service completed") {
                        ?>
                        <div><?php echo ($order_date); ?></div>
                        <div><?php echo ($out_for_service_date); ?></div>
                        <div><?php echo ($service_completed_date); ?></div>
                        <?php
                    } else {
                        ?>
                        <div><?php echo ($order_date); ?></div>
                        <div><?php echo ($order_cancelled_date); ?></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT -->
    <?php
    include "includes/footer.php";
    ?>

</body>

</html>