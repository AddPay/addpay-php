<?php

namespace AddPay\Foundation;

use Httpful\Request;

class Api
{
    private $client_id;
    private $client_secret;

    public function __construct($config = array())
    {
        $this->client_id = $config['client_id'] ? $config['client_id'] : '';
        $this->client_secret = $config['client_secret'] ? $config['client_secret'] : '';

        if ($config['client_live']) {
            define('ADDPAY_BASE_URL', 'https://secure.addpay.co.za/v2');
        } else {
            define('ADDPAY_BASE_URL', 'https://secure-test.addpay.co.za/v2');
        }
    }

    public function prepare()
    {
        $token = base64_encode("{$this->client_id}:{$this->client_secret}");

        return Request::init()
                      ->withoutStrictSsl()
                      ->expectsJson()
                      ->withAuthorizationHeader("Token {$token}")
                      ->sendsType(\Httpful\Mime::FORM);
    }
}
