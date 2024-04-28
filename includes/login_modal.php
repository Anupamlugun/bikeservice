<!-- Login modal -->
<div class="modal fade" id="Login_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login with Bike Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="Login-form" class="form" role="form" method="post" action="login_submit.php"
                onsubmit="return validate_l()">

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number"
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
                    <button type="submit" class="btn btn-outline-success">Login</button>
                </div>
            </form>
            <div class="modal-footer" style="display: block; text-align: center;">
                <span>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Signup_Modal">Clik here</a>
                    to register a new account
                </span><br>
                <div style="display: flex;
    justify-content: space-evenly;"><span></span><a href="http://localhost/Bikeservice/Member"><i
                            class="fa-solid fa-user-gear"></i>Mechanic</a><span><a
                            href="http://localhost/Bikeservice/Admin/"><i
                                class="fa-solid fa-user-pen"></i>Admin</a></span>
                </div>
            </div>
        </div>
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