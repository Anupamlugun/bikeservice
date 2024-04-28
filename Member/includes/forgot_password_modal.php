<div class="modal fade" id="Forgot_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgot password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="Login-form" class="form" role="form" method="post" action="#">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" id="email_OTP" class="form-control" name="email_OTP" placeholder="email"
                            required="">
                    </div>
                    <div id="email_msg" style="color: red; font-style: oblique;">

                    </div>
                    <span id="send_OTP" style=" cursor: pointer; display:flex; justify-content: end;"
                        onclick="send_OTP()">Send OTP</span>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="OTP" placeholder="0TP" maxlength="6" minlength="6"
                            required="">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                        </div>
                        <input type="text" id="inputPassword5" name="forgot_password" placeholder="Create new password"
                            class="form-control" aria-describedby="passwordHelpBlock" required="">

                    </div>

                    <div class="form-group" style="display: flex; justify-content:center ;">
                        <button type="submit" class="btn btn-outline-success">update</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Login_Modal">Click here</a>
                        to login
                    </span>
                </div>
            </div>
        </div>
    </div>