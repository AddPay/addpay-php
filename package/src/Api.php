<?php

namespace AddPay\Foundation;

use Httpful\Request;

class Api
{
    private $client_id;
    private $client_secret;
    private $url;

    const LIVE_URL = 'https://secure.addpay.co.za/v2/';
    const TEST_URL = 'https://secure-test.addpay.co.za/v2/';

    public function __construct($client_id, $client_secret, $isLive = true)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->url = $isLive ? self::LIVE_URL : self::TEST_URL;
    }

    public function prepare()
    {
        return Request::expectsJson()->withAuthorisationHeader(base64_encode("{$client_id}:{$client_secret}"));
    }
}
