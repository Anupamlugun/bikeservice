<!-- poster -->
<?php
if (!isset($_SESSION["user_id"])) {
    ?>
    <div class="banner-container poster">
        <h1 class="pb-3" style="color: #ffc107;"><b>BIKE SERVICE</b></h1>
        <p style="color: #ece9e6;">An online bike service website, from which you can get service for your bike which
            will be served in your location.</p>
        <form class="d-flex" style="justify-content: center;">
            <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#Login_Modal">Book
                Your Services</button>
        </form>
        <div id="SERVICES"></div>
    </div>

    <?php
} else {
    ?>
    <div class="banner-container poster">
        <h1 class="pb-3" style="color: #ffc107;"><b>Hello,
                <?php echo ($full_name); ?>
            </b></h1>
        <p style="color: #ece9e6;">An online bike service website, from which you can get service for your bike which
            will be served in your location.</p>
        <form class="d-flex" style="justify-content: center;">
            <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#Order_Modal">Book
                Your Services
            </button>
        </form>
        <div id="SERVICES"></div>
    </div>
    <?php
}
?>