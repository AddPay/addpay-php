<?php

require('package/src/bootstrap.php');

use Httpful\Request;

addpay([
  'client_id'       => 'client_id_here',
  'client_secret'   => 'client_secret_here',
  'client_live'     => false
]);

//
// --------------------------
// Get a List of Transaction
// --------------------------
//
$transactions = Request::get(ADDPAY_BASE_URL . '/transactions')->send();

var_dump($transactions->body);

//
// --------------------------
// Get a Single Transaction
// --------------------------
//
$transaction = Request::get(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>')->send()

var_dump($transaction->body);

//
// --------------------------
// Create a Transaction
// --------------------------
//
$transaction = Request::post(ADDPAY_BASE_URL . '/transactions')->body([
  'reference'     => 'Sample',
  'description'   => 'Sample Description',
  'amount'        => [
    'value'          => 1.50,
    'currency_code'  => 'ZAR'
  ]
])->send();

var_dump($transaction->body);

//
// --------------------------
// Update a Transaction
// --------------------------
//
$transaction = Request::put(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>')->body([
  'description'   => 'Updated Sample Description',
])->send();

var_dump($transaction->body);

//
// --------------------------
// Create a Contract
// --------------------------
//
$contract = Request::post(ADDPAY_BASE_URL . '/contracts/')->body([
  'reference'  => 'SampleContract',
  'interval'   => 'MONTH',
  'action_day' => 31,
])->send();

var_dump($contract->body);

//
// --------------------------
// Update a Contract
// --------------------------
//
$contract = Request::put(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>')->body([
  'reference' => 'Updated'
])->send();

var_dump($contract->body);

//
// --------------------------
// Get a Contract
// --------------------------
//
$contract = Request::get(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>')->send();

var_dump($contract->body);

//
// --------------------------
// Get a List of Contracts
// --------------------------
//
$contract = Request::get(ADDPAY_BASE_URL . '/contracts')->send();

var_dump($contract->body);

//
// --------------------------
// Create a Customer
// --------------------------
//
$customer = Request::post(ADDPAY_BASE_URL . '/customers')->body([
  'firstname' => 'John',
  'lastname'  => 'Doe',
  'email'     => 'john@example.org',
  'mobile'    => '+27800123123'
])->send();

var_dump($customer->body);

//
// --------------------------
// Update a Customer
// --------------------------
//
$customer = Request::put(ADDPAY_BASE_URL . '/customers/<CUSTOMER_ID>')->body([
  'firstname' => 'Peter',
  'mobile'    => '+27800123123'
])->send();

var_dump($customer->body);

//
// --------------------------
// Get a Customer
// --------------------------
//
$customer = Request::get(ADDPAY_BASE_URL . '/customers/<CUSTOMER_ID>')->send();

var_dump($customer->body);

//
// --------------------------
// Get a List of Customers
// --------------------------
//
$customer = Request::get(ADDPAY_BASE_URL . '/customers/<CUSTOMER_ID>')->send();

var_dump($customer->body);

//
// -------------------------------------
// Associate a Customer to a Transaction
// -------------------------------------
//

Request::put(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>');

//
// -------------------------------------
// Dissociate a Customer from a Transaction
// -------------------------------------
//

Request::delete(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>');

//
// -------------------------------------
// Associate a Transaction to a Contract
// -------------------------------------
//

Request::put(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>');

//
// -------------------------------------
// Dissociate a Transaction from a Contract
// -------------------------------------
//

Request::delete(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>');
