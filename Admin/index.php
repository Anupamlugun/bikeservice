<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'includes/head-links.php';
    ?>

    <link rel="stylesheet" href="css/admin.css">
    <title>Admin page</title>
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
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: rgb(12 16 33); color: aliceblue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.jpg" alt="bikeservice logo" width="50" height="50">
            </a>
            <div id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <form class="d-flex" style="justify-content: center;">
                        <button class="btn" style="background-color: #75ff09;" type="button" data-bs-toggle="modal"
                            data-bs-target="#Signup_Modal">login</button>
                    </form>
            </div>
        </div>
    </nav>
    <!-- Login modal -->
    <div class="modal fade" id="Signup_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">login with Bike Services</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="signup-form" class="form" role="form" method="post" action="login_submit.php"
                    onsubmit="return validate_l()">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number"
                            maxlength="10" minlength="10" required="">
                    </div>



                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" id="password" name="password" placeholder="password" class="form-control"
                            aria-describedby="passwordHelpBlock" required="">

                    </div>

                    <div id="v" style="color: red; font-style: oblique;">

                    </div>


                    <div class="form-group" style="display: flex; justify-content:center ;">
                        <button type="submit" class="btn " style="background-color: #75ff09;">login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <!-- Admin Page -->
    <center>
        <h1 style="color: #d5d50d;"><u>ADMIN</u></h1>
    </center>
    <div class="container-fluid pt-5">
        <div class="container admin">
            <div class="row" style="border: none;">
                <div class="col-sm-4 col-12 admin_d mt-4" style="text-align: center;">

                    <!-- Anupam Lugun  -->
                    <div class="card" style="background-color:#adc5f9;">
                        <img src="img/Anu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <b>ANUPAM LUGUN</b>
                            <p class="card-text">(Backend developer)</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 col-12 admin_d mt-4" style="text-align: center; border: none; ">
                    <!-- <img src="deepak.jpg"><br>
                    Deepak Mahli -->
                    <div class="card" style="background-color:#eafd6c;">
                        <img src="img/deepak.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <b>DEEPAK MAHLI</b>
                            <p class="card-text">(Frontend developer)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-12 admin_d mt-4" style="text-align: center; border: none;">

                    <div class="card" style="background-color:#e66af4;">
                        <img src="img/Rahul.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <b>RAHUL KUMAR SAHU</b>
                            <p class="card-text">(Frontend developer)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <!-- CONTACT -->
    <div class="container-fluid " style="background-color:  rgb(12 16 33); color: aliceblue;">
        <div class="footer">
            <div class="page-container footer-container">
                <div class="footer-copyright">© 2023 Copyright Bike Service </div>
            </div>
        </div>

        <script>
            function validate_l() {
                let p = document.getElementById("phone").value;
                let pass = document.getElementById("password").value;
                // alert("working" + p + "pass is " + pass);

                $.ajax({
                    method: "POST",
                    url: "ajax/login_v.php",
                    data: { phone: p, password: pass },
                    success: function (data) {
                        $("#v").html(data);
                    }
                });
                let vali = document.getElementById("v").innerHTML;
                if (vali) {
                    return false;
                }
            }
        </script>

</body>

</html>