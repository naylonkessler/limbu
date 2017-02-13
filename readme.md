# Limbu

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b7d56434-3be0-4c52-8548-e60e6389eb9c/big.png)](https://insight.sensiolabs.com/projects/b7d56434-3be0-4c52-8548-e60e6389eb9c)

Limbu is the light markup builder a package for simple composition of markup in an object oriented way.

## Installation

Just require the package using composer.

```sh
composer require naylonkessler/limbu
```

## Using the package

Import and create a tag object:

```php
<?php

use Limbu\Tag;

$fragment = new Tag('div');
```
