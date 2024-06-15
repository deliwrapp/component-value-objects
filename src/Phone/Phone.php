<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Phone;

use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectTrait;
use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Phone object.
 */
final class Phone extends PhoneNumber implements PhoneInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var PhoneNumber|string */
    private $number;

    private ?string $region = null;

    /**
     * @psalm-suppress MixedAssignment
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);
        $keepRawInput = $values[self::CONFIG_KEEP_RAW_INPUT] ?? false;

        if (false === \is_bool($keepRawInput)) {
            throw new \InvalidArgumentException('The value of "keepRawInput" MUST be "bool".');
        }

        if (\is_string($values[self::NUMBER])) {
            $phoneUtil    = PhoneNumberUtil::getInstance();
            $this->number = $phoneUtil->parse($values[self::NUMBER], $this->getRegion(), null, $keepRawInput);
        }

        if ($this->number instanceof PhoneNumber) {
            $this->mergeFrom($this->number);
        }

        $this->valueObject = $this->number;
    }

    /**
     * @return array<string,int|string|null> [
     *                                       'countryCode' => $this->getCountryCode(),
     *                                       'number'      => $this->getNationalNumber(),
     *                                       'region'      => $this->getRegion(),
     *                                       ];
     */
    public function __toArray(): array
    {
        return [
            self::COUNTRY_CODE => $this->getCountryCode(),
            self::NUMBER       => $this->getNationalNumber(),
            self::REGION       => $this->getRegion(),
        ];
    }

    public function getNumber(): PhoneNumber
    {
        if (\is_string($this->number)) {
            throw new \RuntimeException('The number is a string: something broken.');
        }

        return $this->number;
    }

    public function getRegion(): string
    {
        if (null === $this->region) {
            throw new \InvalidArgumentException('The value of "region" cannot be "null".');
        }

        return $this->region;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * @param Phone|string $number
     */
    protected function setNumber($number): void
    {
        $this->number = $number;
    }

    protected function setRegion(string $region): void
    {
        $this->region = $region;
    }
}
