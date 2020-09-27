# Polygon.io API PHP Client 
This repository is a fork of polygon-io/client-php, the original repository is not been maintained properly so decided to maintain my own version. Feel free to contribute. 

## Compatibility matrix
Below you will find which PHP client version to use depending on your PIM version.

PIM Version | API PHP client version|Stable
--- | --- | ---
v1.0 - v2.0 | v.1.x | :white_medium_small_square:
v1.0 - v2.0 | v.2.x | :white_check_mark:
v1.0 - v2.0 | v.3.x | :white_medium_small_square:

This package uses [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) as HTTP abstraction layer and [amphp/websocket-client](https://github.com/amphp/websocket-client) as WebSocket abstraction layer. 

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
$forex = $client->rest()->forex();

var_dump($forex->realTimeCurrencyConversion('USD', 'EUR'));
```

## [Websockets](https://polygon.io/sockets)

The WebSocket clients use the Amp event loop. You can only use one WebSocket client by PHP thread since the event loop is in blocking while loop.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = (new ErsinDemirtas\PolygonIO\Client('API_KEY'))->websockets();

$currencies = ['XQ.BTC-USD'];

$client->crypto()->connect($currencies, function($data) {
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
