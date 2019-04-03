<?php

namespace App\Http\Controllers;

require_once ('.././vendor/autoload.php');

use GlobalPayments\Api\ServicesConfig;
use GlobalPayments\Api\ServicesContainer;
use GlobalPayments\Api\Entities\Exceptions\ApiException;
use GlobalPayments\Api\PaymentMethods\CreditCardData;
use GlobalPayments\Api\Entities\Enums\CvnPresenceIndicator;

use Illuminate\Http\Request;

class GlobalPaymentController extends Controller
{

public function pay(Request $request){
    $config = new ServicesConfig();
$config->merchantId = "casperscontruct";
$config->accountId = "internet";
$config->sharedSecret = "secret";
$config->serviceUrl = "https://api.sandbox.realexpayments.com/epage-remote.cgi";

ServicesContainer::configure($config);

// create the card object
$card = new CreditCardData();
$card->number = $request->cardnumber;
$card->expMonth = $request->expirydatemm;
$card->expYear =  $request->expirydateyy;
$card->cvn =  $request->cvn;
$card->cvnPresenceIndicator = CvnPresenceIndicator::PRESENT;
$card->cardHolderName = $request->cardholdername;

try {
    // process an auto-settle authorization
    $response = $card->charge($request->amount)
            ->withCurrency("EUR")
            ->execute();

    $result = $response->responseCode; // 00 == Success
    $message = $response->responseMessage; // [ test system ] AUTHORISED
    // gmet the details to save to the DB for future Transaction Management requests
    $orderId = $response->orderId;
    $authCode = $response->authorizationCode;
    $paymentsReference = $response->transactionId;

    return $result;
} catch (ApiException $e) {
    return "error";
}

}
    
}



