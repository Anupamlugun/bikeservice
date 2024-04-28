<!--Sign up Modal -->
<div class="modal fade" id="Signup_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign up with Bike Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="signup-form" class="form" role="form" method="post" action="signup_submit.php"
                onsubmit="return validate()">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name" maxlength="30"
                        required="">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" maxlength="10"
                        minlength="10" required="">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                </div>
                <div id="email_v" style="color: red; font-style: oblique;">

                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                    </div>
                    <input type="text" id="inputPassword5" name="password" placeholder="Create password"
                        class="form-control" aria-describedby="passwordHelpBlock" required="">

                </div>

                <div class="form-group" style="display: flex; justify-content:center ;">
                    <button type="submit" class="btn btn-outline-success">Sign up</button>
                </div>
            </form>
            <div class="modal-footer">
                <span>Already have an account?
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Login_Modal">Login</a>
                </span><br><br>
                <div style="display: flex;justify-content: space-evenly;">
                    <span>
                        <a href="http://localhost/Bikeservice/Member"><i class="fa-solid fa-user-gear"></i>Mechanic</a>
                    </span>
                    <span>
                        <a href="http://localhost/Bikeservice/Admin/"><i class="fa-solid fa-user-pen"></i>Admin</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function validate() {
        let e = document.getElementById("email").value;
        //alert(e);
        $.ajax({
            method: "POST",
            url: "ajax/signup_v.php",
            data: { email: e },
            success: function (data) {
                $("#email_v").html(data);
            }
        });
        let vali = document.getElementById("email_v").innerHTML;
        if (vali) {
            return false;
        }
    }
</script>