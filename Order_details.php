<?php
session_start();
require("includes/database_connect.php");
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die;
}
$user_id = $_SESSION['user_id'];
//echo($user_id);
$order_id = $_GET['order_id'];
$sql_id = "SELECT * FROM orders where shope_id =$order_id AND customer_id ='$user_id'";
$result_id = mysqli_query($conn, $sql_id);
if (!$result_id) {
    echo ("SQL_ID went wrong");
}
if(!$row_count_id = mysqli_num_rows($result_id)){
    header("location: index.php");
    die;
}


$sql_customer = "SELECT * FROM customer where id ='$user_id'";
$result_customer = mysqli_query($conn, $sql_customer);
if (!$result_customer) {
    echo ("SQL_ID went wrong");
}

$row_customer = mysqli_fetch_assoc($result_customer);

    $email_customer = $row_customer['email'];
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
    <script src="js_mody/Order_details.js"></script>
    <title>Order Details</title>
</head>

<body>
    <!-- navbar -->
    <?php
    include "includes/navbar.php";
    ?>

    <!-- Order_details -->
    <?php
    $sql = "SELECT * FROM orders INNER JOIN services ON orders.service_type_id = services.id WHERE orders.shope_id = $order_id AND orders.customer_id ='$user_id'";
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
    $price_amount = $row['price_amount'];


    ?>

    <div class="container pb-5 pt-5">
        <h1 style="text-align: center; color:#ffc107; background-color: white;">ORDER DETAILS:
            <?php echo ($shope_id); ?>
        </h1>
        <div class="row">
            <div class="col-sm-12 col-md-5 cardstyle1">

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
                if($price_amount > 0 && $order_status != "Order Cancelled" && $price != 'Paid'){
                    ?>
                   <form class="d-flex" style="justify-content: center;" method="post" action="./pay/pay.php">
                      <input type="hidden" name="customer_id" value="<?php echo ($user_id); ?>">
                      <input type="hidden" name="shope_id" value="<?php echo ($shope_id); ?>">
                      <input type="hidden" name="Name" value="<?php echo ($full_name); ?>">
                      <input type="hidden" name="email" value="<?php echo ($email_customer); ?>">
                      <input type="hidden" name="phone" value="<?php echo ($phone); ?>">
                      <input type="hidden" name="Address" value="<?php echo ($location); ?>">
                      <input type="hidden" name="Price" value="<?php echo ($price_amount); ?>">
                      <button class="btn btn-outline-success" type="submit">Pay $<?php echo ($price_amount); ?></button>
                   </form>
                    <?php
                }
                elseif($order_status == "Order Cancelled"){

                }
                elseif($price == 'Due'){
                    ?>
                    <div class="d-flex" style="justify-content: center; color: green;">
                      <b>Wait for Payment option</b>
                    </div>
                   <?php
                }
                else{
                    ?>
                    <div class="d-flex" style="justify-content: center; color: green;">
                      <b>Price: &#8377;<?php echo ($price_amount);?> Paid</b>
                    </div>
                   <?php
                }
                ?>
            </div>
            <div class="col-sm-12 col-md-5 cardstyle2" id="cancel">
                <h6 style="text-align: center;">Order Status:</h6>
                <div class="order-status" style="display: flex; border: none rgb(235, 255, 14); justify-content: space-between;">
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
                <div class="status"  style="display: flex; border: none; align-items: center;">
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
                </div><br>
                <?php
                if ($order_status == "Service completed"){
                    ?>
                <div class="feedback-section">
                    <div id="order" style="display: none;"><?php echo ($shope_id); ?></div>
                    <h6>Feedback:</h6>
                    <div class="feedback-star" id="str">
                    <?php
                    $sql_s = "SELECT rating FROM orders where shope_id = $shope_id";
                    $result_s = mysqli_query($conn, $sql_s);
                    if (!$result_s) {
                        echo ("SQL went wrong");
                        return;
                    }
                    $row_s = mysqli_fetch_assoc($result_s);
                    $rating_r = ($row_s['rating']);
                    //echo($rating_r);
                    if($rating_r == 0){
                        ?>
                        <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
                            <i class="fa-regular fa-2x fa-star"></i>
                        </div>
    
                        <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
                            <i class="fa-regular fa-2x fa-star"></i>
                        </div>
    
                        <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
                            <i class="fa-regular fa-2x fa-star"></i>
                        </div>
    
                        <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
                            <i class="fa-regular fa-2x fa-star"></i>
                        </div>
    
                        <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
                            <i class="fa-regular fa-2x fa-star"></i>
                        </div>  
    
                        <?php
                        }
                    elseif($rating_r == 1){
                    ?>
                    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>

                    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>

                    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>

                    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>  

                    <?php
                    }
                    elseif($rating_r == 2){
                    ?>
                    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>

                    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>

                    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>  
                    <?php
                    }
                    elseif($rating_r == 3){
                    ?>
                    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>

                    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>  
                     <?php
                    }
                    elseif($rating_r == 4){
                            ?>
                    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-regular fa-2x fa-star"></i>
                    </div>  
                            <?php
                    }
                    elseif($rating_r == 5){
                            ?>
                    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>

                    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
                        <i class="fa-solid fa-2x fa-star"></i>
                    </div>  
                            <?php
                    }
                            ?>
                    </div>
                    <?php
                     $sql_f = "SELECT feedback FROM orders where shope_id = $shope_id";
                     $result_f = mysqli_query($conn, $sql_f);
                     if (!$result_f) {
                         echo ("SQL went wrong");
                         return;
                     }
                     $row_f = mysqli_fetch_assoc($result_f);
                     $rating_f = ($row_f['feedback']);
                    //echo($rating_f);
                    ?>
                    <div class="mb-3">
                        <label for="feedback_area" class="form-label">Give your Feedback</label>
                        <textarea class="form-control" id="feedback_area" rows="3"
                            placeholder="<?php if($rating_f){echo($rating_f);}else{?>Write here<?php }?>"></textarea>
                    </div>
                    <div id="thank">

                    </div>
                    <div class="d-flex" style="justify-content: center;">
                        <input class="btn btn-outline-success" type="submit" onclick="feedback_submit()">
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if($order_status != "Service completed" &&  $order_status != "Order Cancelled" && $price != 'Paid' &&  $order_status != "Out For Service"){
    ?>
    <div class="form-group" style="display: flex; justify-content:center ;">
        <button type="submit" class="btn btn-outline-success" data-bs-toggle="modal"
            data-bs-target="#cancel_order">Cancel Order</button>
    </div>
    <?php
    }
    ?>

    <!-- Cancel Order -->
    <div class="modal fade" id="cancel_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Cancelation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to Cancel your Order?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success"  data-bs-dismiss="modal" onclick="cancel_order()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cancel_order() {
         let cart = <?php echo ($shope_id); ?>;
         //alert(cart);
         $.ajax({
         method: "POST",
         url: "ajax/order_cancel.php",
         data: {cancel_id: cart},
         success: function (data) {
            $("#cancel").html(data);
        }
        });
      }
    </script>

</body>

</html>