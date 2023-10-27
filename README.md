# php-cyberimpact

A php wrapper to the Cyberimpact api.

## Getting started

Require it with composer:

```bash
composer require bernier154/php-cyberimpact
```

Simple usage looks like:

```php
include('./vendor/autoload.php');

use bernier154\PhpCyberimpact\CyberimpactClient;

$client = new CyberimpactClient("YOUR_CYBERIMPACT_TOKEN"); // You will need to generate an api token in your Cyberimpact account.
$groups = $client->retrieveGroups();
```
