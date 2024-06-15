IP Simple Value Object
======================

Represents an IP value.

## Base Ip signature

```php
// vendor/darsyn/ip/src/IP.php

/**
 * Constructor
 *
 * @access public
 * @param string $ip
 * @param integer $type
 * @throws \InvalidArgumentException
 * @throws \Darsyn\IP\InvalidIpAddressException
 */
public function __construct($ip)
```

## How to use the object

See the working example: [examples/Ip.php](examples/Ip.php).

```php
$value = '127.0.0.1';

$ip = new Ip($value);
dump($ip);
```

## Other useful info

About CIDR: http://software77.net/cidr-101.html

## Relevant alternatives

* [rlanvin/php-ip](https://github.com/rlanvin/php-ip)
