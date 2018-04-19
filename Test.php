<?php

require('package/src/bootstrap.php');

$authorisation = [
  'client_id'       => '123',
  'client_secret'   => '123',
  'client_live'     => true
];

$transactions = addpay($authorisation)->get(ADDPAY_BASE_URL . '/transactions')->send();

var_dump($transactions->body);
