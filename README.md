# Polygon.io php api client
This repository is a fork of polygon-io/client-php, the original repository is not been maintained properly so decided to maintain my own version. Feel free to contribute. 

## Installation guide

### Prerequisite

- [composer](https://getcomposer.org/)
- [php > 7.4](https://www.php.net/)

### Install

``` 
composer require ersindemirtas/polygonio-php-client
```

## [Rest API](https://polygon.io/docs/#getting-started)

The `ErsinDemirtas\PolygonIO\Rest\Rest` class export 4 modules:

- reference
- stocks
- forex
- crypto

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = new ErsinDemirtas\PolygonIO\Client('API_KEY');

$amount = 10;
var_dump($client->rest()->forex()->realTimeCurrencyConversion->get('USD', 'EUR', compact('amount')));
```

## [Websockets](https://polygon.io/sockets)

The WebSocket clients use the Amp event loop. You can only use one WebSocket client by PHP thread since the event loop is in blocking while loop.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = new ErsinDemirtas\PolygonIO\Client('API_KEY');

$currencies = ['XQ.BTC-USD'];

$client->websockets()->crypto()->connect($currencies, function($data) {
    var_dump($data);
});

```

More examples are available under [examples](examples) folder.

## Development

### Prerequisite

- [composer](https://getcomposer.org/)
- [php > 7.4](https://www.php.net/)
- [ext-json](https://www.php.net/manual/en/json.installation.php)
- [ext-ast](https://github.com/nikic/php-ast#installation)

### Use the tooling

Install dependencies
```
composer require
```

Run the linter
```bash
composer lint
```

Run the tests
```
composer test
```
