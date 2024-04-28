<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
// create the razorpay order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
//
// we create an razorpay order using order api
// doc: https://docs.razorpay.com/docs/orders
//
$customer_id = $_POST['customer_id'];
$shope_id = $_POST['shope_id'];
$name = $_POST['Name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$Address = $_POST['Address'];
$Price = $_POST['Price'];
$orderData = [
    'receipt' => 'rcptid_11',
    'amount' => $Price * 100,
    // 39900 rupees in paise
    'currency' => 'INR'
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$checkout = 'automatic';
if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
    $checkout = $_GET['checkout'];
}

$data = [
    "key" => $keyId,
    "amount" => $amount,
    "name" => "BIKESERVICE",
    "description" => "just for code",
    "image" => "logo.png",
    "prefill" => [
        "name" => $name,
        "email" => $email,
        "contact" => $phone,
    ],
    "notes" => [
        "address" => $Address,
        "merchant_order_id" => $customer_id,
    ],
    "theme" => [
        "color" => "#ff7a00"
    ],
    "order_id" => $razorpayOrderId,
];
if ($displayCurrency !== 'INR') {
    $data['display_currency'] = $displayCurrency;
    $data['displayAmount'] = $displayAmount;
}
$json = json_encode($data);
require("checkout/manual.php");
?>
