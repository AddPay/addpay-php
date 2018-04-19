<?php

require_once(__DIR__ . '/../vendor/autoload.php');

function addpay($client_id, $client_secret, $live)
{
    $client = \AddPay\Foundation\Api::client($client_id, $client_secret, $live);

    return $client->prepare();
}
