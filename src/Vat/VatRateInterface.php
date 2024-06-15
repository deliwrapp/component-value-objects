<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Vat;

use Deliwrapp\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface VatRateInterface extends SimpleValueObjectInterface
{
    public const COUNTRY_CODE = 'countryCode';
    public const PERCENTAGE   = 'percentage';

    /**
     * @param string $countryCode
     */
    public function __construct($countryCode);

    public function getCountryCode(): string;

    public function getPercentage(): float;
}
