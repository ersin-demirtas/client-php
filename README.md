# Polygon.io php api client

## Installation guide

### Prerequisite

- [composer](https://getcomposer.org/)
- [php > 7.4](https://www.php.net/)

### Install

``` 
composer require polygon-io/api
```

## [Rest API](https://polygon.io/docs/#getting-started)

The `\PolygonIO\Rest\Rest` class export 4 modules:

- reference
- stocks
- forex
- crypto

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$rest = new \PolygonIO\Rest\Rest('API_KEY');

$amount = 10;
var_dump($rest->forex->realTimeCurrencyConversion->get('USD', 'EUR', compact('amount')));
```

## [Websockets](https://polygon.io/sockets)

The WebSocket clients use the Amp event loop. You can only use one WebSocket client by PHP thread since the event loop is in blocking while loop.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = new PolygonIO\PolygonIO('API_KEY');

$currencies = ['XQ.BTC-USD'];

$client->websockets->crypto->connect($currencies, function($data) {
    var_dump($data);
});

```

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
