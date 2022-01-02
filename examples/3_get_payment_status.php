<?php
include(__DIR__ . './../vendor/autoload.php');

/*
    You can check and follow up payment status and user interactions with payment page once you prepared and redirected your customer to it
*/

$apiKey = 'YOUR_API_KEY';
$apiSecret = 'YOUR_API_SECRET';

$paymentUID = 'PAYMENT_UID';

$ePaymentsClient = new EasyGCO\EasyGCOPayments\API($apiKey,$apiSecret);

$testApiPath = 'payment/status';

$testInputData = [
    'uid' => $paymentUID,
];

$apiResponse = $ePaymentsClient->doRequest($testApiPath, $testInputData);

if(!$apiResponse || !is_array($apiResponse))
    exit('Something Went Wrong');

if($apiResponse['status'] !== 'success')
    exit($apiResponse['status'] . ' : ' . $apiResponse['message']);

print_r($apiResponse);