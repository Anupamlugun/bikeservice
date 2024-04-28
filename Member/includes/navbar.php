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
        <div class="collapse navbar-collapse" id="navbarSupportedContent" onclick="list_collapse()">
            <?php
            if (!isset($_SESSION["mechanic_id"])) {
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#CONTACT">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" style="justify-content: center;">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                        data-bs-target="#Login_Modal">Login</button>
                </form>
                <?php
            } else {
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myprofile.php">My Profile</a>
                    </li>
                </ul>
                <a href="logout.php" class="d-flex" style="justify-content: center; text-decoration: none;">
                    <button class="btn btn-outline-success" type="button">Log out</button>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>