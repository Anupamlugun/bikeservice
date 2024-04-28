<!-- navbar -->
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: rgb(12 16 33); color: aliceblue;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Bootstrap" width="50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: #ff7a00;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- checking user login or not -->
        <?php
        if (!isset($_SESSION["user_id"])) {
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" onclick="list_collapse()">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#SERVICES">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#MEMBER">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ABOUT">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#CONTACT">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" style="justify-content: center;">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                        data-bs-target="#Signup_Modal">Sign up</button>
                </form>
            </div>
            <?php
        } else {
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" onclick="list_collapse()">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#SERVICES">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#MEMBER">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#ABOUT">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#CONTACT">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myprofile.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myorder.php">My Orders</a>
                    </li>
                </ul>
                <form class="d-flex" style="justify-content: center;">
                    <a href="logout.php">
                        <button class="btn btn-outline-success" type="button">Log out</button>
                    </a>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
</nav>