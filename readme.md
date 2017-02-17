# Limbu

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b7d56434-3be0-4c52-8548-e60e6389eb9c/big.png)](https://insight.sensiolabs.com/projects/b7d56434-3be0-4c52-8548-e60e6389eb9c)
[![Build Status](https://travis-ci.org/naylonkessler/limbu.svg?branch=master)](https://travis-ci.org/naylonkessler/limbu)

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

use Limbu\Limbu;
use Limbu\Elements\Img;
use Limbu\Elements\Tag;

// Using the factory
$factory = new Limbu();
$div = $factory->tag('div');

// Using the Tag class
$div = new Tag('div');

// Using a specialized class
$img = new Img(['src' => 'home-image-url.jpg']);
```
