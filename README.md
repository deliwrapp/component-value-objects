<h1 align="center">Deliwrapp Value Objects</h1>
<p align="center">A set of <a href="#" target="_blank">PHP Value Objects</a> to manage simple and composite values.</p>
<p align="center">Originaly based on the work of Adamo Aerendir Crespi from <a href="http://www.serendipityhq.com" target="_blank">Serendipty HQ</a></p>
<p align="center">
    <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square"></a>
</p>
<p align="center">
    Supports:
    <a title="Tested with Symfony ^4.4" href="#"><img title="Tested with Symfony ^4.4" src="https://img.shields.io/badge/Symfony-%5E4.4-333?style=flat-square&logo=symfony" /></a>
    <a title="Tested with Symfony ^5.4" href="#"><img title="Tested with Symfony ^5.4" src="https://img.shields.io/badge/Symfony-%5E5.4-333?style=flat-square&logo=symfony" /></a>
    <a title="Tested with Symfony ^6.0" href="#"><img title="Tested with Symfony ^6.0" src="https://img.shields.io/badge/Symfony-%5E6.0-333?style=flat-square&logo=symfony" /></a>
</p>

<p align="center">
    <a href="https://www.php.net/manual/en/book.intl.php"><img src="https://img.shields.io/badge/Suggests-ext--intl-%238892BF?style=flat-square&logo=php"></a>
    <a href="https://www.doctrine-project.org/"><img src="https://img.shields.io/badge/Suggests-doctrine/orm-%238892BF?style=flat-square&logo=php"></a>
    <a href="https://symfony.com/doc/current/forms.html"><img src="https://img.shields.io/badge/Suggests-symfony/form-%238892BF?style=flat-square&logo=php"></a>
    <a href="https://github.com/twigphp/intl-extra"><img src="https://img.shields.io/badge/Suggests-twig/intl--extra-%238892BF?style=flat-square&logo=php"></a>
</p>

## Features

It supports `SimpleValueObjects` and `ComplexValueObjects`.

Complex value objects are hydrated passing an array. If a key of the array isn't recognized as property of the object it
 is added to the `$otherData` array so it isn't lost.

Some of those value objects support also the persistence in Doctrine providing [custom mapping types](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/cookbook/custom-mapping-types.html) (See below).

<hr />

## What are Value Objects

Value Objects are PHP [`objects`](http://php.net/manual/en/language.types.object.php) that represent and manage simple
 or complex values. Once set, the value object cannot be modified without changing its identity.

**Simple value objects** represent a simple value, like an email.
**Complex value objects** represent complex values, that, in order to really represent a value, need more than one
value, like a price that needs an amount and a currency to be understandable and have a sense.

PHP supports only one value object: the [`DateTime`](http://php.net/manual/en/class.datetime.php) object.

This library gives support for other kind of values, differentiating them between complex and simple.

To better understand the concepts behind the value objects, you can [read this post](https://io.serendipityhq.com/experience/php-and-doctrine-immutable-objects-value-objects-and-embeddables/).

## Install component-value-objects via Composer

    $ composer require deliwrapp/component-value-objects

This library follows the http://semver.org/ versioning conventions.

## Available Value Objects

Currently, this library supports the following Value Objects:

* **[Address](docs/Address.md)**: Built-in. A more advanced value object is [`commerceguys/addressing`](https://github.com/commerceguys/addressing) (but it more suited for shipping addresses than for addresses themself);
* **[CurrencyExchangeRate](docs/CurrencyExchangeRate.md)**: Built-in;
* **[Email](docs/Email.md)**: A basic class derived from [Wowo's gist EmailValueObject](https://gist.github.com/wowo/b49ac45b975d5c489214). It implements [`egulias/email-validator](https://github.com/egulias/EmailValidator) to validate emails;
* **[IP](docs/Ip.md)**: Just a proxy for the library [`darsyn/ip`](https://github.com/darsyn/ip);
* **[Money](docs/Money.md)**: Just a proxy for the library [`moneyphp/money`](https://github.com/moneyphp/money);
* **[Payment](docs/Payment.md)**: Built-in
* **[Phone](docs/Phone.md)**: Just a proxy for the library [`giggsey/libphonenumber-for-php`](https://github.com/giggsey/libphonenumber-for-php);
* **[Tax](docs/Tax.md)**: Built-in
* **[Uri](docs/Uri.md)**: Just a proxy for the library [`Laminas\Uri`](https://github.com/laminas/laminas-uri) (formerly Zend Uri). A more advanced value object is [`League\Uri`](https://github.com/thephpleague/uri)
* **[VatRate](docs/Vat.md)**: Built-in
* **[VatNumber](docs/VatNumber.md)**: Built-in

## Supported features

<table>
    <thead>
        <tr>
            <th scope="col">ValueObject</th>
            <th scope="col" colspan="2">Doctrine</th>
            <th scope="col" colspan="2">Symfony</th>
        </tr>
        <tr>
            <th scope="col"></th>
            <th scope="col">Embeddable</th>
            <th scope="col">Type</th>
            <th scope="col">Form Type</th>
            <th scope="col">Twig filter</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Address</th>
            <td>✓</td>
            <td>✕</td>
            <td>✓</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Currency</th>
            <td>N/A</td>
            <td>✓</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">CurrencyExchangeRate</th>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td>N/A</td>
            <td>✓</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">IP</th>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Money</th>
            <td>N/A</td>
            <td>✓</td>
            <td>✓</td>
            <td>✓</td>
        </tr>
        <tr>
            <th scope="row">Payment</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Phone</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Tax</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Uri</th>
            <td>✕</td>
            <td>✓</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">VAT Rate</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">VAT Number</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
    </tbody>
</table>

<hr />
