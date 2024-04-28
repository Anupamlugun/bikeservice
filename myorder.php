<?php
session_start();
require("includes/database_connect.php");


if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die;
}
$user_id = $_SESSION['user_id'];
//echo($user_id);

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

    <link href="css_mody/myorder.css" rel="stylesheet" />
    <title>My Order</title>
    <style>
        .suc_off {
            position: absolute;
            margin-top: -50px;
            transition: 1s;
        }

        .suc_on {
            margin-top: 0px;
        }
    </style>
</head>

<body onload="succes()">
    <!-- navbar -->
    <?php
    include "includes/navbar.php";
    ?>

    <script>
        function succes() {
            var element = document.getElementById("suc");
            element.classList.toggle("suc_on");
        }
        function succ_off() {
            var element = document.getElementById("suc");
            element.classList.remove("suc_on");
        }
    </script>
    <?php
    if (isset($_SESSION['succes'])) {
        $succes_msg = $_SESSION['succes'];
        echo '<div class=" suc_off" id="suc" style="background-color: green; color: white; text-align: center; width: 100%" onclick="succ_off()">
            <a href="#" style="color: white">
            Order Succesfully completed
            <br>
            <i class="fa-solid fa-xmark fa-beat" style="color: #fc0303;"></i>
            </a>
            </div>
            ';
        unset($_SESSION['succes']);
    }
    ?>
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
            // echo($rowcount_all);
            
            $sql = "SELECT * FROM orders where customer_id ='$user_id'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo ("SQL went wrong");
            }

            if ($rowcount = mysqli_num_rows($result)) {
                for ($x = $rowcount_all; $x >= 1; $x--) {
                    $sql2 = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = '$x' AND orders.customer_id ='$user_id'";
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

                        ?>
                        <div class="order-l pt-5">
                            <a href="Order_details.php?order_id=<?php echo ($shope_id); ?>">
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
                                            <h5>ORDER STATUS</h5>
                                            <?php
                                            if ($order_status == "Order Cancelled") {
                                                ?>
                                                <div class="order-status-canceled">
                                                    <?php
                                            } else {
                                                ?>
                                                    <div class="order-status">
                                                        <?php
                                            }
                                            ?>

                                                    <i class="fa-solid fa-circle">
                                                        <span>
                                                            <?php echo ($order_status); ?>
                                                        </span>
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="container" style="text-align: center; margin-top: 25%; color: white">
                    <i class="fa-solid  fa-5x fa-cart-plus"></i><br>
                    <b>No Orders</b>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

</body>

</html>
</body>

</html>