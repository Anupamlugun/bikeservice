<?php
require("includes/database_connect.php");


$sql3 = "SELECT * FROM services";
$result3 = mysqli_query($conn, $sql3);
if (!$result3) {
    echo ("SQL2 went wrong");
    return;
}
?>

<!--order details modal -->
<div class="modal fade" id="Order_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fill your Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="Order-form" class="form" role="form" method="post" action="order_submit.php"
                onsubmit="return validation()">
                <label for="select_service" class="form-label">Select Your Service</label>
                <div id="select_service" style="display: flex;  align-items: center;">

                    <?php
                    $rowcount = mysqli_num_rows($result3);
                    //printf("Result set has %d rows.\n",$rowcount);
                    $displayrow = $rowcount / 4;
                    $displayrow++;
                    //echo( $displayrow);
                    $r = 1;
                    while ($r <= $displayrow) {
                        ?>
                        <div class="check-box">
                            <?php
                            $x = 1;
                            while ($x <= 3) {
                                $row3 = mysqli_fetch_assoc($result3);
                                $id = $row3['id'];
                                $service_type = $row3['service_type'];

                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="check_data[]"
                                        value="<?php echo ($id); ?>" id="check<?php echo ($id); ?>">
                                    <label class="form-check-label" for="check<?php echo ($id); ?>">
                                        <?php echo ($service_type); ?>
                                    </label>
                                </div>
                                <?php
                                $x++;
                            }
                            ?>

                        </div>

                        <?php
                        $r++;
                    }
                    ?>

                </div>
                <div id="not_valid" style="color: red; font-style: oblique; display: none;">
                    *Select minimum one Service.
                </div>
                <br>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Write about your Order</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="2"
                        onclick="checkbox()"></textarea>
                </div>


                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name" maxlength="30"
                        required="" >
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
                <div class="form-group" style="display: flex; justify-content:center ;">
                    <button type="button" class="btn btn-outline-success" onclick="getLocation()">Choose Current
                        location</button>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-city"></i>
                        </span>
                    </div>
                    <input type="text" id="state" class="form-control" name="state" placeholder="State" maxlength="30"
                        required="" onkeyup="newfun(this)">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-tree-city"></i>
                        </span>
                    </div>

                    <script>

                        //validation
                        function validation() {
                            let a10 = document.getElementById("city_msg2").innerHTML;
                            if (a10 == "Service not available in this city or correct your spelling") {
                                // alert("service not  availabe");
                                return false;
                            }
                            else {
                                //alert("service availabe");
                                //return false;
                            }
                        }

                        function newfun(v) {
                            let city_v = document.getElementById("city").value;
                            var letters = /^[A-Za-z]+$/;
                            if (v.value.match(letters)) {
                                $.ajax({
                                    method: "POST",
                                    url: "ajax/city.php",
                                    data: { city_name: city_v },
                                    success: function (data) {
                                        $("#city_msg2").html(data);
                                    }
                                });
                            }
                            else {
                               // document.getElementById("city_msg2").innerHTML='Only Alphabet'
                                return false;
                            }
                        }
                    </script>
                    <input type="text" id="city" class="form-control" name="city" placeholder="City" maxlength="30"
                        required="" onkeyup="newfun(this)">
                </div>
                <div id="city_msg" style="color: red; font-style: oblique; display: none">

                </div>
                <div id="city_msg2" style="color: red; font-style: oblique;">
                      
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-tree-city"></i>
                        </span>
                    </div>
                    <input type="text" id="your_area" class="form-control" name="your_area" placeholder="Your area Name"
                        maxlength="30" required="" onclick="newfun()">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                    </div>
                    <input type="text" id="pincode" class="form-control" name="pincode" placeholder="Pin code"
                        maxlength="6" minlength="6" required="">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa-solid fa-road"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="road_name" name="road_name" placeholder="Road Name"
                        maxlength="30" required="" onkeyup="newfun()">
                </div>
                <div class="form-group" style="display: flex; justify-content:center ;">
                    <button type="submit" class="btn btn-outline-success">Order Now</button>
                </div>
            </form>
            <div class="modal-footer">
                <span style="text-align: center;">
                    <b>Note:-</b><br>If you don't know the problem of your bike then just click on Order Now Our
                    mechanic will analyse and fix the problem.
                </span>
            </div>
        </div>
    </div>
</div>