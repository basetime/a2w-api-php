# AddToWallet PHP Client

Client library that communicates with the addtowallet API.

```php
<?php
use Basetime\A2w\Client;

$client = new Client('api_key', 'api_secret');
$passes = $client->campaigns->getPasses('123');
dump($passes);
```
