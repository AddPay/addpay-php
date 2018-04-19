<?php

require('package/src/bootstrap.php');

$authorisation = [
  'client_id'       => 'f0ckxUqcMTUyMTk5NjgwMA',
  'client_secret'   => 'aI2kisctW46lqKcGV6jdiErbIPfFyESbEiRyvnUhqP4Ovm84r',
  'client_live'     => false
];

//
// --------------------------
// Get a List of Transaction
// --------------------------
//
$transactions = addpay($authorisation)->get(ADDPAY_BASE_URL . '/transactions')->send();

var_dump($transactions->body);
