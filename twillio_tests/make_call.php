<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;


$isCLI = php_sapi_name() == 'cli';

if ($isCLI) {
    $accountSid   = getenv("TWILIO_ACCOUNT_SID");
    $authToken    = getenv("AUTH_TOKEN");
    $twilioNumber = $argv[1];
    $toNumber     = $argv[2];
} else {
    $accountSid   = $_GET["sid"];
    $authToken    = $_GET["auth"];
    $twilioNumber = $_GET["from"];
    $toNumber     = $_GET["to"];
}

if (empty($accountSid) || empty($authToken)) {
    throw new Exception("Missing twilio credentials");
}

if (empty($twilioNumber) || empty($toNumber)) {
    throw new Exception("Missing phone numbers");
}

$client = new Client($accountSid, $authToken);
$client->account->calls->create(
    $toNumber,
    $twilioNumber,
    array(
        "url" => "http://demo.twilio.com/docs/voice.xml"
    )
);