# Polygon.io php api client

## Installation guide

### prerequisite

- [composer](https://getcomposer.org/)
- php > 7.4

### install

``` 
composer require polygon-io/api
```

## [Rest API](https://polygon.io/docs/#getting-started)

The `\PolygonIO\rest\Rest` class export 4 modules:

- reference
- stocks
- forex
- crypto

```php
<?php
require __DIR__ . '/vendor/autoload.php';
use PolygonIO\rest\Rest;

$rest = new Rest('API_KEY');

$amount = 10;
var_dump($rest->forex->realTimeCurrencyConversion->get('USD', 'EUR', compact('amount')));
```

## Websockets

The websocket clients use the Amp event loop. 
You can only use one websocket client by php thread since the event loop is in a blocking while loop.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = new PolygonIO\PolygonIO('API_KEY');

$currencies = ['XQ.BTC-USD'];

$client->websockets->crypto->connect($currencies, function($data) {
    var_dump($data);
});

```

## Developement

### prerequisite

- [composer](https://getcomposer.org/)
- php > 7.4
- ext-json
- ext-ast

### use the tooling

Install dependencies
```
composer require
```

Run the linter
```bash
./vendor/bin/phplint .
```

Run the tests
```
./vendor/bin/phpunit
```
