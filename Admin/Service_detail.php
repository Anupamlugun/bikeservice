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

    <link href="css/services.css" rel="stylesheet" />
    <title>Service Detail</title>
</head>
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

    <!-- detail  -->
    <center>
        <h1><b style="color: #75ff09;"> Total Services</b></h1>
    </center>
    <!-- order details -->
    <div class="container-flude">
        <div class="container">
            <?php
            $sql_all = "SELECT * FROM orders";
            $result_all = mysqli_query($conn, $sql_all);
            if (!$result_all) {
                echo ("SQL went wrong");
            }
            $rowcount_all = mysqli_num_rows($result_all);

            if ($rowcount_all != 0) {
                for ($x = $rowcount_all; $x >= 1; $x--) {
                    $sql2 = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = '$x'";
                    $result2 = mysqli_query($conn, $sql2);
                    if (!$result2) {
                        echo ("SQL went wrong");
                    }

                    if ($row_count2 = mysqli_num_rows($result2)) {
                        $row2 = mysqli_fetch_assoc($result2);

                        $shope_id = $row2['shope_id'];
                        $font = $row2['font'];
                        $service_type = $row2['service_type'];
                        $price = $row2['price'];
                        $order_status = $row2['order_status'];
                        $full_name = $row2['full_name'];


                        ?>
                        <div class="order-l pt-5">
                            <div>
                                <div class="myorder-list">
                                    <h5 class="oid" style="text-align: center;">ORDER ID:
                                        <?php echo ($shope_id); ?>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>ORDER DETAILS</h5>
                                            <div class="serv" style="display: flex; text-align: center;">
                                                <p class="col"><i class="fa-solid <?php echo ($font); ?>"></i>
                                                    <?php echo ($service_type); ?>
                                                </p>

                                                <?php
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    $service_type = $row2['service_type'];
                                                    $font = $row2['font'];
                                                    ?>
                                                    <p class="col"><i class="fa-solid <?php echo ($font); ?>"></i>
                                                        <?php echo ($service_type); ?>
                                                    </p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>ORDER PRICE</h5>
                                            <div class="price">
                                                <h6>
                                                    <?php echo ($price); ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>CUSTOMER NAME</h5>
                                            <div class="customer_name">
                                                <h6>
                                                    <?php echo ($full_name); ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>


</body>

</html>