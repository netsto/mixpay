<?php
include "../../../init.php";
include_once ROOTDIR . "/includes/gatewayfunctions.php";

$gatewaymodule = "mixpay";
$GATEWAY = getGatewayVariables("mixpay");
$resultJson = file_get_contents("php://input");
//file_put_contents(__DIR__ . "/mixpay2" . time() . ".txt", $resultJson . PHP_EOL . "time：" . date("Y-m-d H:i:s")); // Callback parameter log
$resultArr = json_decode($resultJson, true);

$url = "https://api.mixpay.me/v1/payments_result?orderId=" . $resultArr["orderId"] . "&payeeId=" . $resultArr["payeeId"];
$response = sendCurlRequest($url);

//file_put_contents(__DIR__ . "/payments_result" . time() . ".txt", $response . PHP_EOL . "time：" . date("Y-m-d H:i:s")); // Callback parameter log
$response = json_decode($response, true);

if (!isset($response["data"]["status"]) || $response["data"]["status"] !== "success") {
    //file_put_contents(__DIR__ . "/error_log.txt", "Payment status verification failed: " . json_encode($response) . PHP_EOL, FILE_APPEND);
    $status = ($response["data"]["failureCode"] == "40000") ? $response["data"]["status"] : "Error";
    $array = [
        "status" => $status,
        "remarks" => $response["data"]["failureReason"],
        "updated_at" => date("Y-m-d H:i:s")
    ];
    update_query("mixpay_orders", $array, ["orderId" => $resultArr['orderId']]);
    exit('fail');
}

$result = get_query_vals("mixpay_orders", "*", array("orderId" => $resultArr['orderId']));
if ($result) {
    $invoiceid = $result["InvoiceId"]; // System invoice ID

    // If the order has been paid or has a time record, exit
    if ($result["status"] == "Paid" || $result["time"]) {
        exit('fail');
    }

    if ($resultArr["orderId"] == $result["orderId"]) {
        // Add payment record
        addInvoicePayment($invoiceid, $invoiceid, $result['amount'], 0, $gatewaymodule);
        logTransaction($GATEWAY["name"], $_REQUEST, "Successful-A");

        // Update order description
        $description = get_query_val("tblinvoiceitems", "description", array("invoiceid" => $invoiceid));
        update_query('tblinvoiceitems', array('description' => $description . $invoiceid), array('invoiceid' => $invoiceid));

        // Update order status
        update_query("mixpay_orders", array(
            "quoteSymbol" => $response["data"]["quoteSymbol"],
            "status" => "Paid",
            "time" => date("Y-m-d H:i:s"),
            "remarks" => "Payment successful",
            "updated_at" => date("Y-m-d H:i:s")
        ), array("InvoiceId" => $invoiceid));

        // Return success response
        header('Content-Type: application/json');
        http_response_code(200);
        exit(json_encode(array("code" => "SUCCESS")));
    }
} else {
    $array = [
        "status" => "failed",
        "remarks" => "can not find the corresponding order",
        "updated_at" => date("Y-m-d H:i:s")
    ];
    update_query("mixpay_orders", $array, ["orderId" => $resultArr['orderId']]);
    exit('fail');
}

function sendCurlRequest($url, $method = "GET", $request = null) {
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => ["content-type: application/json"],
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT => 30,
    ];

    if (defined("CURLOPT_IPRESOLVE") && defined("CURL_IPRESOLVE_V4")) {
        $options[CURLOPT_IPRESOLVE] = CURL_IPRESOLVE_V4;
    }

    if ($request) {
        $options[CURLOPT_POSTFIELDS] = json_encode($request);
    }

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}