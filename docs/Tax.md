Tax Complex Value Object
========================

Represents a tax value.

## Base Tax signature

```php
// src/Tax/Tax.php

/**
 * @param string $values
 */
public function __construct($values)
```

## How to use the object

See the working example: [examples/Payment.php](examples/Payment.php).

```php
use Deliwrapp\Component\ValueObjects\Money\Money;
use Deliwrapp\Component\ValueObjects\Tax\Tax;

$values = [
    Tax::AMOUNT => new Money([Money::HUMAN_AMOUNT => 200, Money::CURRENCY =>'EUR']),
    Tax::CODE => 'IVA IT',
    Tax::COMPOUND => new Money([Money::HUMAN_AMOUNT => 100, Money::CURRENCY =>'EUR']),
    Tax::RATE => 22.0,
    Tax::TITLE => 'IVA Italiana'
];

$tax = new Tax($values);
dump($tax);
```