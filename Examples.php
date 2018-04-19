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
$transactions = addpay($authorisation)->get('/transactions')->send();

//
// --------------------------
// Get a Single Transaction
// --------------------------
//
$transaction = addpay($authorisation)->get('/transactions/<TRANSACTION_ID>')->send()

//
// --------------------------
// Create a Transaction
// --------------------------
//
$transaction = addpay($authorisation)->post('/transactions')->body([
  'reference'     => 'Sample',
  'description'   => 'Sample Description',
  'amount'        => [
    'value'          => 1.50,
    'currency_code'  => 'ZAR'
  ]
])->send();

//
// --------------------------
// Update a Transaction
// --------------------------
//
$transaction = addpay($authorisation)->put('/transactions/<TRANSACTION_ID>')->body([
  'description'   => 'Updated Sample Description',
])->send();

//
// --------------------------
// Create a Contract
// --------------------------
//
$contract = addpay($authorisation)->post('/contracts/')->body([
  'reference'  => 'SampleContract',
  'interval'   => 'MONTH',
  'action_day' => 31,
])->send();

//
// --------------------------
// Update a Contract
// --------------------------
//
$contract = addpay($authorisation)->put('/contracts/<CONTRACT_ID>')->body([
  'reference' => 'Updated'
])->send();

//
// --------------------------
// Get a Contract
// --------------------------
//
$contract = addpay($authorisation)->get('/contracts/<CONTRACT_ID>')->send();

//
// --------------------------
// Get a List of Contracts
// --------------------------
//
$contract = addpay($authorisation)->get('/contracts')->send();

//
// --------------------------
// Create a Customer
// --------------------------
//
$customer = addpay($authorisation)->post('/customers')->body([
  'firstname' => 'John',
  'lastname'  => 'Doe',
  'email'     => 'john@example.org',
  'mobile'    => '+27800123123'
])->send();

//
// --------------------------
// Update a Customer
// --------------------------
//
$customer = addpay($authorisation)->put('/customers/<CUSTOMER_ID>')->body([
  'firstname' => 'Peter',
  'mobile'    => '+27800123123'
])->send();

//
// --------------------------
// Get a Customer
// --------------------------
//
$customer = addpay($authorisation)->get('/customers/<CUSTOMER_ID>')->send();

//
// --------------------------
// Get a List of Customers
// --------------------------
//
$customer = addpay($authorisation)->get('/customers/<CUSTOMER_ID>')->send();

//
// -------------------------------------
// Associate a Customer to a Transaction
// -------------------------------------
//

addpay($authorisation)->put("/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>}");

//
// -------------------------------------
// Dissociate a Customer to a Transaction
// -------------------------------------
//

addpay($authorisation)->delete("/transactions/<TRANSACTION_ID>/customers/<CUSTOMER_ID>");

//
// -------------------------------------
// Associate a Transaction to a Contract
// -------------------------------------
//

addpay($authorisation)->put("/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>");

//
// -------------------------------------
// Dissociate a Transaction from a Contract
// -------------------------------------
//

addpay($authorisation)->delete("/contracts/<CONTRACT_ID>/transactions/<TRANSACTION_ID>");
