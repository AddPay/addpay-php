# AddPay PHP REST Client
This is a standard, off the shelf HTTP REST CLIENT that does AddPay authentication behind the scenes for every API call, 
zero maintenance is required. You pass the desired payload across as a simple array, no complex object involved.

## Why?
 - No maintenance. If a new endpoint is created, simple add your new line: `Api::get($newEndpoint);`And you're done.
