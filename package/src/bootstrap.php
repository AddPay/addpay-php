<?php

require_once(__DIR__ . '/../vendor/autoload.php');

function addpay($config)
{
    $client = new \AddPay\Foundation\Api($config);

    return $client->prepare();
}
