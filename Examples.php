<?php

require('package/src/bootstrap.php');

use AddPay\Api;

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
$transactions = Api::get('/transactions')->send();

var_dump($transactions->body);

//
// --------------------------
// Get a Single Transaction
// --------------------------
//
$transaction = Api::get('/transactions/<TRANSACTION_ID>')->send();

var_dump($transaction->body);

//
// --------------------------
// Create a Transaction
// --------------------------
//
$transaction = Api::post('/transactions')->body([
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
$transaction = Api::put('/transactions/<TRANSACTION_ID>')->body([
  'description'   => 'Updated Sample Description',
])->send();

var_dump($transaction->body);

//
// --------------------------
// Create a Contract
// --------------------------
//
$contract = Api::post('/contracts/')->body([
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
$contract = Api::put('/contracts/<CONTRACT_ID>')->body([
  'reference' => 'Updated'
])->send();

var_dump($contract->body);

//
// --------------------------
// Get a Contract
// --------------------------
//
$contract = Api::get('/contracts/<CONTRACT_ID>')->send();

var_dump($contract->body);

//
// --------------------------
// Get a List of Contracts
// --------------------------
//
$contract = Api::get('/contracts')->send();

var_dump($contract->body);

//
// --------------------------
// Create a Customer
// --------------------------
//
$customer = Api::post('/customers')->body([
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
$customer = Api::put('/customers/<CUSTOMER_ID>')->body([
  'firstname' => 'Peter',
  'mobile'    => '+27800123123'
])->send();

var_dump($customer->body);

//
// --------------------------
// Get a Customer
// --------------------------
//
$customer = Api::get('/customers/<CUSTOMER_ID>')->send();

var_dump($customer->body);

//
// --------------------------
// Get a List of Customers
// --------------------------
//
$customer = Api::get('/customers/<CUSTOMER_ID>')->send();

var_dump($customer->body);

//
// -------------------------------------
// Associate a Customer to a Transaction
// -------------------------------------
//

Api::put('/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>');

//
// -------------------------------------
// Dissociate a Customer from a Transaction
// -------------------------------------
//

Api::delete('/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>');

//
// -------------------------------------
// Associate a Transaction to a Contract
// -------------------------------------
//

Api::put('/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>');

//
// -------------------------------------
// Dissociate a Transaction from a Contract
// -------------------------------------
//

Api::delete('/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>');
