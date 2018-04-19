<?php

namespace AddPay\Foundation;

use Httpful\Request;

class Api
{
    private $client_id;
    private $client_secret;
    private $url;

    const LIVE_URL = 'https://secure.addpay.co.za/v2';
    const TEST_URL = 'https://secure-test.addpay.co.za/v2';

    public function __construct($config = array())
    {
        $this->client_id = $config['client_id'] ? $config['client_id'] : '';
        $this->client_secret = $config['client_secret'] ? $config['client_secret'] : '';

        if ($config['client_live']) {
            $this->url = self::LIVE_URL
        } else {
             $this->url = self::TEST_URL;
        }
    }

    public function prepare()
    {
        return Request::expectsJson()->withAuthorisationHeader(base64_encode("{$this->client_id}:{$this->client_secret}"));
    }
}
