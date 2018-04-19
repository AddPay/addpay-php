<?php

namespace AddPay;

use Httpful\Request;

class Api extends Request
{
    public static function get($url, $mime = NULL)
    {
        $url = self::fixUrl($url);

        return parent::get($url, $mime);
    }

    public static function post($url, $payload = NULL, $mime = NULL)
    {
        $url = self::fixUrl($url);

        return parent::post($url, $mime);
    }

    public static function patch($url, $payload = NULL, $mime = NULL)
    {
        $url = self::fixUrl($url);

        return parent::patch($url, $mime);
    }

    public static function delete($url, $mime = NULL)
    {
        $url = self::fixUrl($url);

        return parent::delete($url, $mime);
    }

    public static function put($url, $payload = NULL, $mime = NULL)
    {
        $url = self::fixUrl($url);

        return parent::put($url, $mime);
    }

    private static function fixUrl($url, $mime = NULL)
    {
        if (strpos('/', $url) != 0) {
            $url = '/' . $url;
        }

        return ADDPAY_BASE_URL . $url;
    }
}
