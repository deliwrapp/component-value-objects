<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Vat;

use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Tax Value object.
 */
final class VatRate implements VatRateInterface
{
    use DisableWritingMethodsTrait;

    /** @var array<string, float> */
    private const COUNTRIES = [
        'IT' => 22.0000,
    ];

    /** @var string The country for which this object represents the VAT */
    private string $countryCode;

    public function __construct($countryCode)
    {
        if (false === \array_key_exists($countryCode, self::COUNTRIES)) {
            throw new \InvalidArgumentException("The passed Country isn't supported by this value object");
        }

        $this->countryCode = $countryCode;
    }

    public function __toString(): string
    {
        return (string) $this->getPercentage();
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPercentage(): float
    {
        return self::COUNTRIES[$this->countryCode];
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }
}
