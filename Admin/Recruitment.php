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

    <link rel="stylesheet" href="css/Recruitment.css">
    <title>Applicants</title>
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

    <!-- Recuirment -->
    <center>
        <h1><b style="color: #75ff09;">APPLICANTS</b></h1>
    </center>

    <div class="container-flude">
        <div class="container">
            <?php
            $sql_all = "SELECT * FROM recruitment";
            $result_all = mysqli_query($conn, $sql_all);
            if (!$result_all) {
                echo ("SQL went wrong");
            }
            $rowcount_all = mysqli_num_rows($result_all);

            if ($rowcount_all != 0) {

                $sql2 = "SELECT * FROM recruitment";
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
                        $workshope_city = $row2["workshope_city"];
                        $accepted = $row2["accepted"];


                        ?>

                        <div class="order-l pt-5">
                            <div>
                                <div class="myorder-list">
                                    <h5 class="oid" style="text-align: center;">APPLICANT</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>
                                                <?php echo ($full_name); ?>
                                            </h5>
                                            <div class="col" style="    display: flex;
                    justify-content: center;
                    align-items: center;">

                                                <i class="fa-solid fa-circle-user fa-10x" style="height: 100%;"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>DETAILS</h5>
                                            <div id="detailsss">Name :
                                                <?php echo ($full_name); ?><br>
                                                Phone :
                                                <?php echo ($phone); ?><br>
                                                Email :
                                                <?php echo ($email); ?><br>
                                                Workshope City Name:
                                                <?php echo ($workshope_city); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>ACCEPT/REJECT</h5>
                                            <form class="customer_name" id="ar<?php echo ($applicant_id) ?>"
                                                style="display: flex; justify-content: space-around;">
                                                <?php
                                                if ($accepted == 'accepted') {
                                                    ?>
                                                    <h4 style="background-color: green; color: white">Accepted</h4>
                                                    <?php
                                                } elseif ($accepted == 'rejected') {
                                                    ?>
                                                    <h4 style="background-color: red; color: white">Rejected</h4>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button type="button" class="btn" style="background-color: rgb(176, 219, 4);"
                                                        onclick="accept_reject('accepted',<?php echo ($applicant_id) ?>)">Accept</button>
                                                    <button type="button" class="btn" style="background-color: rgb(176, 219, 4);"
                                                        onclick="accept_reject('rejected',<?php echo ($applicant_id) ?>)">Reject</button>
                                                    <?php
                                                }
                                                ?>
                                            </form>
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
    <script>
        function accept_reject(x, id) {
            //alert(x);
            if (x == "accepted") {
                //alert("accepted" + id);
                $.ajax({
                    method: "POST",
                    url: "ajax/accept.php",
                    data: { aid: id },
                    success: function (data) {
                        $("#ar" + id).html(data);
                    }
                });
            }
            else {
                //alert("rejected" + id);
                $.ajax({
                    method: "POST",
                    url: "ajax/reject.php",
                    data: { aid: id },
                    success: function (data) {
                        $("#ar" + id).html(data);
                    }
                });
            }
        }
    </script>
</body>

</html>