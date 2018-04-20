# AddPay PHP REST Client
This is a standard, off the shelf HTTP REST CLIENT that does AddPay authentication behind the scenes for every API call, 
zero maintenance is required. You pass the desired payload across as a simpl array, no complex object involved.

## Why?
 - Reliablility! Data parsing is consistent, the body will always be returned as a generic object class (stdClass) even in the event of a failure.
 - Simple, 1-line API calls.
 - No magic, everything is transparent and standardized. REST.
 - No low-level code. You don't have to deal with the pains of curl options. 
 - No maintenance. If a new endpoint is created, simply add your new line: `Api::get($newEndpoint);` or for a post use `(Api::post($endPoint)->send())->body` and you're done, simple.

## How To
See the exmaples for full usage, or if that isn't clear enough to you:

- Instantiate the AddPay HTTP Library once-off:
```php
require('package/src/bootstrap');

use \AddPay\Api;

addpay([
  'client_id'       => 'client_id_here',
  'client_secret'   => 'client_secret_here',
  'client_live'     => false
]);
```
- Call any API endpoint: 
```php
$restCall = Api::get('/transactions')->send();
```
- Getting the result:
```php
$restCall->body;
```
Simple.
