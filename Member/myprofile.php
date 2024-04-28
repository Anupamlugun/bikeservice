<?php
session_start();
require("includes/database_connect.php");
if (isset($_SESSION["mechanic_id"])) {
    $user_id = $_SESSION['mechanic_id'];

    $sql = "SELECT * FROM mechanics  where id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo ("SQL went wrong");
        return;
    }
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
    $image = $row["image"];
    $full_name = $row["full_name"];
    $phone = $row["phone"];
    $email = $row["email"];
} else {
    header("location: index.php");
}
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
    <link href="css_mody/myprofile.css" rel="stylesheet" />
    <script src="js/myprofile.js"></script>

    <link rel="icon" href="img/logo.png">

    <title>My Profile</title>
    <style>
        .upload {
            width: 125px;
            position: relative;
            margin: auto;
        }

        .upload img {
            border-radius: 50%;
            border: 8px solid #DCDCDC;
        }

        .upload .round {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #00B4FF;
            width: 32px;
            height: 32px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
        }

        .upload .round input[type="file"] {
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }

        input[type=file]::-webkit-file-upload-button {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php
    include "includes/navbar.php";
    ?>

    <!-- profile -->
    <div class="container">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="profile">
                <div class="col profile-icon">
                    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                        <div class="upload">
                            <img src="img/<?php echo $image; ?>" width=125 height=125 title="<?php echo $image; ?>">
                            <div class="round">

                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="name" value="<?php echo $full_name; ?>">
                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                <i class="fa fa-camera" style="color: #fff;"></i>
                            </div>
                        </div>
                    </form>
                </div><br>
                <div class="info">
                    <div class="info-d user_details">
                        <span><b>Full Name:</b>
                            <?php echo ($full_name); ?>
                        </span><br>
                        <span><b>Phone No:</b>
                            <?php echo ($phone); ?>
                        </span><br>
                        <span><b>Email ID:</b>
                            <?php echo ($email); ?>
                        </span>
                    </div>

                    <form class="info-d display_none" class="form" action="user_update.php" method="POST">

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name"
                                maxlength="30" required="">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                maxlength="10" minlength="10" required="">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                        </div>
                        <div id="email_v" style="color: red; font-style: oblique;">

                        </div>

                        <div class="account" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-outline-success">Save Changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="account"
            style="display: flex; justify-content: space-between; color: white; text-decoration: underline;">
            <span style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#Deactivate_Account_modal">Deactivate
                Account</span>
            <span style="cursor: pointer;" onclick="edit()" id="edit_button">Edit Profile</span>
        </div>
    </div>
    <!-- Deactivate Account modal -->
    <div class="modal fade" id="Deactivate_Account_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account Deactivation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to Deactivate your account?
                </div>
                <form class="modal-footer" onsubmit=" return Deactivate()" action="logout.php">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                </form>
            </div>
        </div>
    </div><br>
    <script>
        function Deactivate() {
            $.ajax({
                url: "ajax/deactivate.php"
            });
        }
    </script>

            <!-- 
photo upload -->
<script type="text/javascript">
            document.getElementById("image").onchange = function () {
                document.getElementById("form").submit();
            };
        </script>
        <?php
        if (isset($_FILES["image"]["name"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];

            $imageName = $_FILES["image"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            // Image validation
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                echo
                    "
        <script>
          alert('Invalid Image Extension');
        </script>
        ";
            } elseif ($imageSize > 1200000) {
                echo
                    "
        <script>
          alert('Image Size Is Too Large');
        </script>
        ";
            } else {
                $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
                $newImageName .= '.' . $imageExtension;
                $query = "UPDATE mechanics SET image = '$newImageName' WHERE id = $user_id";
                mysqli_query($conn, $query);
                move_uploaded_file($tmpName, 'img/' . $newImageName);
                echo "
                <script>
                location.href = 'myprofile.php';
                </script>
                ";
            }
        }
        ?>
</body>

</html>