<?php
session_start();
require("includes/database_connect.php");

if (isset($_SESSION["mechanic_id"])) {
    $user_id = $_SESSION['mechanic_id'];

    $sql = "SELECT * FROM mechanics where id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo ("SQL went wrong");
        return;
    }
    $row = mysqli_fetch_assoc($result);
    $full_name = $row["full_name"];
    $city_m = $row["city"];
    //echo ($city_m);

    $sql_c = "SELECT * FROM `cities` where city = '$city_m'";
    $result_c = mysqli_query($conn, $sql_c);
    if (!$result_c) {
        echo ("SQL_c went wrong");
        return;
    }
    $row_c = mysqli_fetch_assoc($result_c);
    $city_id = $row_c["id"];
    //echo ($city_id);

} else {
    session_destroy();
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'includes/head_links.php'
        ?>
    <link href="css/Dashboard.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body style="background-color: gray;">
    <!-- navbar -->
    <?php
    include 'includes/navbar.php'
        ?>

    <div class="container-fluid text-center"
        style="background-color: #ffc107; color: white; text-transform: uppercase;">
        <h1><b>BIKE SERVICE IN
                <?php echo ($city_m); ?>
            </b></h1>
    </div>
    <div class="tabContainer">
        <div class="buttonContainer">
            <button onclick="showPanel(0,'#808080')">New Orders</button>
            <button onclick="showPanel(1,'#808080')">Out for Service</button>
            <button onclick="showPanel(2,'#808080')">Service Completed</button>
            <!-- <button onclick="showPanel(3,'#808080')">My Salary</button> -->
        </div>
        <div class="tabPanel">

            <!--New order -->
            <div class="container-flude">
                <div class="container">
                    <?php
                    $sql_all = "SELECT * FROM orders";
                    $result_all = mysqli_query($conn, $sql_all);
                    if (!$result_all) {
                        echo ("SQL went wrong");
                    }
                    $rowcount_all = mysqli_num_rows($result_all);

                    $sql = "SELECT * FROM orders where city = $city_id";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo ("SQL went wrong");
                    }

                    if ($rowcount = mysqli_num_rows($result)) {
                        for ($x = $rowcount_all; $x >= 1; $x--) {
                            $sql2 = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = '$x' AND orders.city = $city_id AND orders.order_status = 'Order Confirmed'";
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
                                                    <h5>CUSTOMER NAME</h5>
                                                    <div class="customer_name">
                                                        <h6>
                                                            <?php echo ($full_name); ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="request_pay" style="display: flex; justify-content: center;">
                                        <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#service"
                                            onclick="out(<?php echo ($shope_id); ?>,'Out For Service','out_for_service_date')">Out
                                            for
                                            Service</button>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="tabPanel">
            <!--Out for service -->
            <div class="container-flude">
                <div class="container">
                    <?php
                    if ($rowcount = mysqli_num_rows($result)) {
                        for ($x = $rowcount_all; $x >= 1; $x--) {
                            $sql2 = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = '$x' AND orders.city = $city_id AND orders.order_status = 'Out For Service'";
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
                                                    <h5>CUSTOMER NAME</h5>
                                                    <div class="customer_name">
                                                        <h6>
                                                            <?php echo ($full_name); ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="request_pay" style="display: flex; justify-content: center;">
                                     <?php
                                     if($price != 'Paid'){
                                        ?>
                                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#pay_request" onclick="payment(<?php echo ($shope_id); ?>)">Enable Payment</button>
                                        <?php
                                     }
                                     ?>
                                        
                                        <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#service"
                                            onclick="out(<?php echo ($shope_id); ?>,'Service completed','service_completed_date')">Service
                                            Completed</button>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="tabPanel">
            <!--service Completed-->
            <div class="container-flude">
                <div class="container">
                    <?php
                    if ($rowcount = mysqli_num_rows($result)) {
                        for ($x = $rowcount_all; $x >= 1; $x--) {
                            $sql2 = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = '$x' AND orders.city = $city_id AND orders.order_status = 'Service completed'";
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
                                                    <h5>CUSTOMER NAME</h5>
                                                    <div class="customer_name">
                                                        <h6>
                                                            <?php echo ($full_name); ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="tabPanel">
            <!-- My Salary -->
            <div class="container">
                <table class="table table-striped table-hover" style="background-color: #ff7a00;">
                    <thead>
                        <tr>
                            <th scope="col">MONTH</th>
                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                            <th scope="col">PAYMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>January</td>
                            <td>1/1/2023</td>
                            <td>12:1 AM</td>
                            <td>Rs 100</td>
                        </tr>
                        <tr>
                            <td>Febuary</td>
                            <td>1/2/2023</td>
                            <td>12:1 AM</td>
                            <td>Rs 100</td>
                        </tr>
                        <tr>
                            <td>March</td>
                            <td>1/3/2023</td>
                            <td>12:1 AM</td>
                            <td>Rs 100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal payment -->
    <div class="modal fade" id="pay_request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Service Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Login-form" class="form" role="form" method="post" action="request_pay.php">

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                &#8377;
                                </span>
                            </div>
                            <input type="number" class="form-control" name="Price" placeholder="Service price"
                                maxlength="10" minlength="10" required="">
                        </div>

                        <input type="hidden" class="form-control" name="shope_id" id="shope_id">
                        <div class="form-group" style="display: flex; justify-content:center ;">
                            <button type="submit" class="btn btn-outline-success">Request Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="js/Dashboard.js"></script>
    <!-- yes no modal -->
    <div class="modal fade" id="service" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-footer" onsubmit=" return yes_no()" method="post" action="#">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                </form>
            </div>
        </div>
    </div><br>
    <div id="s" style="display: none;"></div>
    <div id="o" style="display: none;"></div>
    <div id="d" style="display: none;"></div>
    <script>
        function out(s, o, d) {
            //alert(s + " " + o + " " + d);
            document.getElementById('s').innerHTML = s;
            document.getElementById('o').innerHTML = o;
            document.getElementById('d').innerHTML = d;
        }

        function yes_no() {
            let x = document.getElementById('s').innerHTML;
            let y = document.getElementById('o').innerHTML;
            let z = document.getElementById('d').innerHTML;
            //alert(x + " " + y + " " + z);
            $.ajax({
                method: "POST",
                url: "ajax/order_status.php",
                data:{shope_id: x, shope_status: y, shope_date: z}
            });
        }

        function payment(s_id){
            document.getElementById('shope_id').value = s_id;
            //alert("ok"+s_id);
        }
    </script>
</body>

</html>