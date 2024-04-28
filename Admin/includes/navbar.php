<nav class="navbar navbar-expand-lg sticky-top" style="background-color: rgb(12 16 33); color: aliceblue;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/logo.jpg" alt="logo" width="50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color:  #75ff09;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" onclick="list_collapse()">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php" style="color: #b6fc1e;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Service_detail.php" style="color: #b6fc1e;">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Recruitment.php" style="color: #b6fc1e;">Applicants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employee-detail.php" style="color: #b6fc1e;">Employees</a>
                </li>

            </ul>
            <a href="logout.php" class="d-flex" style="justify-content: center; text-decoration:none;">
                <button class="btn" type="button" style="background-color: #75ff09;" data-bs-toggle="modal"
                    data-bs-target="#Signup_Modal">Log Out</button>
            </a>
        </div>
    </div>
</nav>