<?php

require('package/src/bootstrap.php');

$authorisation = [
  'client_id'       => '123',
  'client_secret'   => '123',
  'client_live'     => true
];

//
// --------------------------
// Get a List of Transaction
// --------------------------
//
$transactions = addpay($authorisation)->get(ADDPAY_BASE_URL . '/transactions')->send();

var_dump($transactions->body);

//
// --------------------------
// Get a Single Transaction
// --------------------------
//
$transaction = addpay($authorisation)->get(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>')->send()

var_dump($transaction->body);

//
// --------------------------
// Create a Transaction
// --------------------------
//
$transaction = addpay($authorisation)->post(ADDPAY_BASE_URL . '/transactions')->body([
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
$transaction = addpay($authorisation)->put(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>')->body([
  'description'   => 'Updated Sample Description',
])->send();

var_dump($transaction->body);

//
// --------------------------
// Create a Contract
// --------------------------
//
$contract = addpay($authorisation)->post(ADDPAY_BASE_URL . '/contracts/')->body([
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
$contract = addpay($authorisation)->put(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>')->body([
  'reference' => 'Updated'
])->send();

var_dump($contract->body);

//
// --------------------------
// Get a Contract
// --------------------------
//
$contract = addpay($authorisation)->get(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>')->send();

var_dump($contract->body);

//
// --------------------------
// Get a List of Contracts
// --------------------------
//
$contract = addpay($authorisation)->get(ADDPAY_BASE_URL . '/contracts')->send();

var_dump($contract->body);

//
// --------------------------
// Create a Customer
// --------------------------
//
$customer = addpay($authorisation)->post(ADDPAY_BASE_URL . '/customers')->body([
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
$customer = addpay($authorisation)->put(ADDPAY_BASE_URL . '/customers/<CUSTOMER_ID>')->body([
  'firstname' => 'Peter',
  'mobile'    => '+27800123123'
])->send();

var_dump($customer->body);

//
// --------------------------
// Get a Customer
// --------------------------
//
$customer = addpay($authorisation)->get(ADDPAY_BASE_URL . '/customers/<CUSTOMER_ID>')->send();

var_dump($customer->body);

//
// --------------------------
// Get a List of Customers
// --------------------------
//
$customer = addpay($authorisation)->get(ADDPAY_BASE_URL . '/customers/<CUSTOMER_ID>')->send();

var_dump($customer->body);

//
// -------------------------------------
// Associate a Customer to a Transaction
// -------------------------------------
//

addpay($authorisation)->put(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>');

//
// -------------------------------------
// Dissociate a Customer from a Transaction
// -------------------------------------
//

addpay($authorisation)->delete(ADDPAY_BASE_URL . '/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>');

//
// -------------------------------------
// Associate a Transaction to a Contract
// -------------------------------------
//

addpay($authorisation)->put(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>');

//
// -------------------------------------
// Dissociate a Transaction from a Contract
// -------------------------------------
//

addpay($authorisation)->delete(ADDPAY_BASE_URL . '/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>');
