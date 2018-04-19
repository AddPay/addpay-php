<?php

require_once(__DIR__ . '/../vendor/autoload.php');

function addpay($client_id, $client_secret, $live)
{
    $client = new \AddPay\Foundation\Api($client_id, $client_secret, $live);

    return $client->prepare();
}
