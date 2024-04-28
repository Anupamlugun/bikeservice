<?php
session_start();
require("includes/database_connect.php");

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM customer where id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo ("SQL went wrong");
        return;
    }
    $row = mysqli_fetch_assoc($result);
    $full_name = $row["full_name"];
}
$sql2 = "SELECT * FROM services";
$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    echo ("SQL2 went wrong");
    return;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #send_OTP:active {
            color: red;
        }
    </style>
    <?php
    include "includes/head_links.php";
    ?>

    <title>Bike Service</title>
    <style>
        .card{
            cursor: pointer;
        }
        .card:active{
            background-color: #495057;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <?php
    include "includes/navbar.php";
    ?>


    <!-- poster -->
    <?php
    include "includes/poster.php";
    ?>


    <!-- Services -->
    <div id="SERVICES">
        <div class="page-container container-fluid" style="border:none red;">
            <h2 class="pb-3 pt-3" style="color: #ffc107; text-align: center;"><b>SERVICES</b></h2>
            <div class="container text-center" style="border:none rgb(50, 205, 33);">

                <div class="row" style="border:none rgb(51, 22, 219);">
                    <?php
                     if (!isset($_SESSION["user_id"])) {
                        $modal = "#Login_Modal";
                     }else{
                        $modal = "#Order_Modal";
                     }
                    $x = 1;
                    while ($x <= 4) {
                        $row2 = mysqli_fetch_assoc($result2);
                        $service_type = $row2['service_type'];
                        $font = $row2['font'];
                        ?>
                        <div class="col" style="border:none rgb(216, 136, 17);" data-bs-toggle="modal" data-bs-target="<?php echo ($modal); ?>">
                            <div class="card">
                                <i class="fa-solid  fa-5x <?php echo ($font); ?> pt-3" style="color: #ffc107;"></i>
                                <div class="card-body">
                                    <h5>
                                        <?php echo ($service_type); ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $x++;
                    }
                    ?>
                </div><br>
                <div class="row" style="border:none rgb(51, 22, 219);">
                    <?php
                    $x = 1;
                    while ($x <= 4) {
                        $row2 = mysqli_fetch_assoc($result2);
                        $service_type = $row2['service_type'];
                        $font = $row2['font'];
                        ?>
                        <div class="col" style="border:none rgb(216, 136, 17);" data-bs-toggle="modal" data-bs-target="<?php echo ($modal); ?>">
                            <div class="card">
                                <i class="fa-solid  fa-5x <?php echo ($font); ?> pt-3" style="color: #ffc107;"></i>
                                <div class="card-body">
                                    <h5>
                                        <?php echo ($service_type); ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $x++;
                    }
                    ?>
                </div><br>
            </div>

        </div>
    </div><br>

    <!-- member -->
    <div id="MEMBER">
        <div class="container-fluid" style="background-image:  linear-gradient(#ff7a00,#ffc107);">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <h1 style="color: white;"><b>Join and become a member of Bike service</b></h1>
                        <h4>Steps To join Bike Service</h4>
                        <b>Step 1:</b> Fill the form and you will be contact.<br>
                        <b>Step 2:</b> Signup in Bike service website.<br>
                        <b>Step 3:</b> Continue to work.<br>
                    </div>
                    <div class="col-12 col-md-4">
                        <?php
                        include "includes/mechanic_form.php";
                        ?>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

    <!-- About -->
    <div id="ABOUT">
        <div class="container-fluid" id="ABOUT">
            <h2 class="pb-3 pt-3" style="color: #ffc107; text-align: center;"><b>ABOUT</b></h2>
            <div class="container">
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <h3 style="color: #ff7a00;">About Bike Service</h3>
                        <p>An online bike service website, from which you can get service for your bike which will be
                            served in your location.<br>
                            The main objective of this Bike Service is to give service like bike wash,engine,repair
                            etc.<br>
                            It will be very much helpful when someone bike gets some problem and there is no service
                            center near by then the person can get service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <!-- CUSTOMER FEEDBACK -->
    <div class="container-fluid" style="background-image:  linear-gradient(#ff7a00,#ffc107);">
        <div class="container">
            <h2 class="pb-3 pt-3" style="color: white; text-align: center;"><b>CUSTOMER FEEDBACK</b></h2>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sql_f1 = "SELECT * FROM orders";
                    $result_f1 = mysqli_query($conn, $sql_f1);
                    if (!$result_f1) {
                        echo ("SQL went wrong");
                    }
                    $rowcount_f1 = mysqli_num_rows($result_f1);
                    for ($x = 0; $x <= $rowcount_f1; $x++) {
                        $sql_f = "SELECT full_name, rating, feedback FROM orders WHERE shope_id = $x;";
                        $result_f = mysqli_query($conn, $sql_f);
                        if (!$result_f) {
                            echo ("SQL went wrong");
                        }
                        $row_f = mysqli_fetch_assoc($result_f);
                        if (isset($row_f['rating']) && isset($row_f['feedback'])) {
                            $full_name = $row_f['full_name'];
                            $rating = $row_f['rating'];
                            $feedback = $row_f['feedback'];
                            /*echo ($full_name);
                            echo ($rating);
                            echo ($feedback)."<br>";*/
                            ?>
                            <div class="carousel-item active">
                                <div class="card feedback-card">
                                    <i class="fa-solid fa-3x fa-circle-user pt-3 icon" style="color: white;"></i>
                                    <div class="card-body feedback-body">
                                        <h5 style="color: white">
                                            <?php echo ($full_name); ?>
                                        </h5>
                                        <div class="feedback-section">
                                            <div class="feedback-star">
                                                <?php
                                                if ($rating == 1) {
                                                    ?>
                                                    <i class="fa-solid  fa-star s1"></i>
                                                    <i class="fa-regular  fa-star s2"></i>
                                                    <i class="fa-regular fa-star s3"></i>
                                                    <i class="fa-regular fa-star s4"></i>
                                                    <i class="fa-regular  fa-star s5"></i>
                                                    <?php
                                                } elseif ($rating == 2) {
                                                    ?>
                                                    <i class="fa-solid  fa-star s1"></i>
                                                    <i class="fa-solid  fa-star s2"></i>
                                                    <i class="fa-regular fa-star s3"></i>
                                                    <i class="fa-regular fa-star s4"></i>
                                                    <i class="fa-regular  fa-star s5"></i>
                                                    <?php
                                                } elseif ($rating == 3) {
                                                    ?>
                                                    <i class="fa-solid  fa-star s1"></i>
                                                    <i class="fa-solid  fa-star s2"></i>
                                                    <i class="fa-solid fa-star s3"></i>
                                                    <i class="fa-regular fa-star s4"></i>
                                                    <i class="fa-regular  fa-star s5"></i>
                                                    <?php
                                                } elseif ($rating == 4) {
                                                    ?>
                                                    <i class="fa-solid  fa-star s1"></i>
                                                    <i class="fa-solid  fa-star s2"></i>
                                                    <i class="fa-solid fa-star s3"></i>
                                                    <i class="fa-solid fa-star s4"></i>
                                                    <i class="fa-regular  fa-star s5"></i>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <i class="fa-solid  fa-star s1"></i>
                                                    <i class="fa-solid  fa-star s2"></i>
                                                    <i class="fa-solid fa-star s3"></i>
                                                    <i class="fa-solid fa-star s4"></i>
                                                    <i class="fa-solid  fa-star s5"></i>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <p>
                                            <?php echo ($feedback); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><br>
        </div>
    </div>

    <!--Modal and footer -->
    <?php
    include "includes/signup_modal.php";
    include "includes/login_modal.php";
    include "includes/order_details_modal.php";
    include "includes/footer.php";
    ?>

</body>

</html>