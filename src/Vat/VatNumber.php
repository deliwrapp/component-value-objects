<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Vat;

use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectTrait;
use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a VatNumber Value object.
 */
final class VatNumber implements VatNumberInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** The country code of the VAT number */
    private string $countryCode;

    /** The number part of the VAT number */
    private string $number;

    /** The full VAT Number, with country ISO code */
    private string $vatNumber;

    public function __toString(): string
    {
        return $this->countryCode . ' ' . (string) $this->number;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Sets the country code of the VatNumber.
     */
    protected function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Method to set the number part of the VAT Number.
     */
    protected function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * Method to set the full VAT Number.
     *
     * @param string $vatNumber The full VAT number, with country ISO code
     */
    protected function setVatNumber(string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }
}
