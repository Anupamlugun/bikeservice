<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'includes/head_links.php'
        ?>
    <title>Bike Service Mechanic</title>
</head>

<body>

    <!-- navbar -->
    <?php
    include 'includes/navbar.php'
        ?>

    <!-- poster -->
    <div class="banner-container poster">
        <h1 class="pb-3" style="color: #ffc107;"><b>BIKE SERVICE MECHANIC</b></h1>
        <p style="color: #ece9e6;">An online bike service website, from which customer can get service for their bike
            which
            will be served in their location.</p>
        <div id="SERVICES"></div>
    </div>

    <!--Modal and footer -->
    <?php
    include "includes/login_modal.php";
    include "includes/forgot_password_modal.php";
    include "includes/footer.php";
    ?>

</body>

</html>