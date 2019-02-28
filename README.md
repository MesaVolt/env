# Environment helper for Symfony 4+

[![Latest Stable Version](https://poser.pugx.org/mesavolt/env/v/stable)](https://packagist.org/packages/mesavolt/env)
[![Build Status](https://travis-ci.com/MesaVolt/env.svg)](https://travis-ci.com/MesaVolt/env)
[![Coverage Status](https://codecov.io/gh/MesaVolt/env/branch/master/graph/badge.svg)](https://codecov.io/gh/MesaVolt/env)
[![License](https://poser.pugx.org/mesavolt/env/license)](https://packagist.org/packages/mesavolt/env)

## Usage

Add the package to your project :

```bash
composer require mesavolt/env
```

Use `Mesavolt\Env::has()` to test if an environment variable exists in your app and
`Mesavolt\Env::get()` to retrieve it.

> Quick note: By default, `Env::get($name)` throws an exception when the variable is
> defined but is empty.
> Use `Env::getSafe($name)` to not throw an exception and get the empty value.


```dotenv
APP_SECRET="i can see dead people"
EMPTY_VAR=
```

Use it in your project :

```php
<?php

use Mesavolt\Env;

$secret = Env::get('APP_SECRET');
$empty = Env::getSafe('EMPTY_VAR');
```


## Testing

```bash
composer dump-autoload # make sure vendor/autoload.php exists
./vendor/bin/phpunit
```
