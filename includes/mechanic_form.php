<form id="signup-form" class="form" role="form" method="post" action="mechanic_submit.php"
    onsubmit="return applied_succes()">
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fas fa-user"></i>
            </span>
        </div>
        <input type="text" class="form-control" name="full_name" placeholder="Full Name" maxlength="30" required="">
    </div>

    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa-solid fa-phone"></i>
            </span>
        </div>
        <input type="text" class="form-control" name="phone" placeholder="Phone Number" maxlength="10" minlength="10"
            required="">
    </div>

    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fas fa-envelope"></i>
            </span>
        </div>
        <input type="email" class="form-control" name="email" placeholder="Email" required="">
    </div>

    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa-solid fa-city"></i>
            </span>
        </div>
        <input type="text" class="form-control" name="city_name" placeholder="Workshope city name" maxlength="150"
            required="">
    </div>
    <div id="applied_succes" style="color: green; font-style: oblique;">

    </div>

    <div class="form-group" style="display: flex; justify-content:center ;">
        <button type="submit" class="btn btn-outline-success">Apply Now</button>
    </div>
</form>
<script>
    function applied_succes() {
        alert("Applied succesfully!");
    }
</script>