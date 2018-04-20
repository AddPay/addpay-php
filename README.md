# AddPay PHP REST Client
This is a standard, off the shelf HTTP REST CLIENT that does AddPay authentication behind the scenes for every API call, 
zero maintenance is required. You pass the desired payload across as a simpl array, no complex object involved.

## Why?
 - No magic, everything is transparent and standardized. REST.
 - No low-level code. You don't have to deal with the pains of curl options. The body will always be returned even in the event of a failure.
 - No maintenance. If a new endpoint is created, simply add your new line: `Api::get($newEndpoint);` or for a post use `(Api::post($endPoint))->body` and you're done, simple.
