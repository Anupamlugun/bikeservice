<div class="row" style=" display:flex; height:100%; ">
    <a href="../Order_details.php?order_id=<?php echo ($shope_id) ?>"
        style="width: 50%; display:flex; justify-content: center; align-item: center; background-color: red; cursor: pointer;text-decoration: none; ">
        <div style="display: flex; align-items: center; color: white; font-size: xxx-large;">
            Cancel</div>
    </a>
    <div id="rzp-button1"
        style="width: 50%; display:flex; justify-content: center; align-item: center; background-color: green; cursor: pointer;">
        <div style="display: flex; align-items: center; color: white; font-size: xxx-large;">Continue
        </div>
    </div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="shope_id" value="<?php echo ($shope_id) ?>">
</form>
<script>
    // Checkout details as a json
    var options = <?php echo $json ?>;

    /**
    * The entire list of checkout fields is available at
    * https://docs.razorpay.com/docs/checkout-form#checkout-fields
    */
    options.handler = function (response) {
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function (e) {
        rzp.open();
        e.preventDefault();
    } 
</script>