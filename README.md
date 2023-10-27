# php-cyberimpact

A php wrapper to the Cyberimpact api.

## Getting started

Require with composer

```bash
$ composer require bernier154/php-cyberimpact
```

## Basics

Initialize the client with your Cyberimpact token
```php
    <?php
include('./vendor/autoload.php');

use bernier154\PhpCyberimpact\CyberimpactClient;

$client = new CyberimpactClient("YOUR_CYBERIMPACT_TOKEN");
$groups = $client->retrieveGroups();

```