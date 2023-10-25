<?php

declare(strict_types=1);

require_once 'Order.php';
require_once __DIR__ . './../service/PaymentService.php';
require_once __DIR__ . './../config/Config.php';

$response = null;
$order = new Order();
$paymentService = new PaymentService();
$data = $paymentService->prepareDate($order);

try {
    $response = $paymentService->sendRequest(Config::getUrl(), $data);
} catch (\Throwable $exception) {
}

$output ="
    <html>
    <head>
    <title>Payment result</title>
    </head>
    <body>";

if (isset($response['result']) && 'SUCCESS' === $response['result']) {
    $output .= 'Payment was successful. Have a nice day' . '</body></html>';
} elseif (isset($response['result']) && 'DECLINED' === $response['result']) {
    $output .= 'Payment failed. Try another card' . '</body></html>';
} else {
    $output .= 'Something went wrong. Please, try later' . '</body></html>';
}

echo $output;
