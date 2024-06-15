<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Address;

// @phan-suppress-next-line PhanUnreferencedUseNormal
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectTrait;
use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * An Address value object.
 *
 * This Value Object use commerceguys/addressing library
 *
 * @see https://github.com/commerceguys/addressing
 *
 * Other useful libraries:
 * - https://github.com/black-project/Address
 * - https://github.com/adamlc/address-format
 *
 * {@inheritDoc}
 */
class Address implements AddressInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /**
     * The two-letter country code.
     *
     * @ORM\Column(name="country_code", type="string", nullable=true)
     */
    #[ORM\Column(name: 'country_code', type: Types::STRING, nullable: true)]
    protected ?string $countryCode = null;

    /**
     * The top-level administrative subdivision of the country.
     *
     * @ORM\Column(name="administrative_area", type="string", nullable=true)
     */
    #[ORM\Column(name: 'administrative_area', type: Types::STRING, nullable: true)]
    protected ?string $administrativeArea = null;

    /**
     * The locality (i.e. city).
     *
     * @ORM\Column(name="locality", type="string", nullable=true)
     */
    #[ORM\Column(name: 'locality', type: Types::STRING, nullable: true)]
    protected ?string $locality = null;

    /**
     * The dependent locality (i.e. neighbourhood).
     *
     * @ORM\Column(name="dependent_locality", type="string", nullable=true)
     */
    #[ORM\Column(name: 'dependent_locality', type: Types::STRING, nullable: true)]
    protected ?string $dependentLocality = null;

    /**
     * The postal code.
     *
     * @ORM\Column(name="postal_code", type="string", nullable=true)
     */
    #[ORM\Column(name: 'postal_code', type: Types::STRING, nullable: true)]
    protected ?string $postalCode = null;

    /**
     * The first line of the address block.
     *
     * @ORM\Column(name="street", type="string", nullable=true)
     */
    #[ORM\Column(name: 'street', type: Types::STRING, nullable: true)]
    protected ?string $street = null;

    /**
     * The second line of the address block.
     *
     * @ORM\Column(name="extra_line", type="string", nullable=true)
     */
    #[ORM\Column(name: 'extra_line', type: Types::STRING, nullable: true)]
    protected ?string $extraLine = null;

    public function __construct(array $values)
    {
        // Set values in the object
        $this->traitConstruct($values);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function getAdministrativeArea(): ?string
    {
        return $this->administrativeArea;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function getDependentLocality(): ?string
    {
        return $this->dependentLocality;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getExtraLine(): ?string
    {
        return $this->extraLine;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function toString(array $options = []): string
    {
        // @todo Add formatters for the address. @see https://github.com/commerceguys/addressing
        throw new \RuntimeException('Method not implemented. See the @todo in the code.');
    }

    protected function setAdministrativeArea(string $administrativeArea): void
    {
        $this->administrativeArea = $administrativeArea;
    }

    protected function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    protected function setDependentLocality(string $dependentLocality): void
    {
        $this->dependentLocality = $dependentLocality;
    }

    protected function setStreet(string $street): void
    {
        $this->street = $street;
    }

    protected function setExtraLine(string $extraLine): void
    {
        $this->extraLine = $extraLine;
    }

    protected function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    protected function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }
}
