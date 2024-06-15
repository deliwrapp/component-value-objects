<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Address\Bridge\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Deliwrapp\Component\ValueObjects\Address\Address;
use Deliwrapp\Component\ValueObjects\Address\AddressInterface;

/**
 * @ORM\Embeddable
 */
#[ORM\Embeddable]
class AddressEmbeddable extends Address
{
    /**
     * Returns the full array, with null values, too.
     * This array is then used in the Form type.
     *
     * @return array<string,string|null>
     */
    public function _toArray(): array
    {
        return [
            AddressInterface::STREET              => $this->getStreet(),
            AddressInterface::EXTRA_LINE          => $this->getExtraLine(),
            AddressInterface::POSTAL_CODE         => $this->getPostalCode(),
            AddressInterface::LOCALITY            => $this->getLocality(),
            AddressInterface::DEPENDENT_LOCALITY  => $this->getDependentLocality(),
            AddressInterface::ADMINISTRATIVE_AREA => $this->getAdministrativeArea(),
            AddressInterface::COUNTRY_CODE        => $this->getCountryCode(),
        ];
    }

    protected function setAdministrativeArea(?string $administrativeArea): void
    {
        if (null !== $administrativeArea) {
            parent::setAdministrativeArea($administrativeArea);
        }
    }

    protected function setCountryCode(?string $countryCode): void
    {
        if (null !== $countryCode) {
            parent::setCountryCode($countryCode);
        }
    }

    protected function setDependentLocality(?string $dependentLocality): void
    {
        if (null !== $dependentLocality) {
            parent::setDependentLocality($dependentLocality);
        }
    }

    protected function setStreet(?string $street): void
    {
        if (null !== $street) {
            parent::setStreet($street);
        }
    }

    protected function setExtraLine(?string $extraLine): void
    {
        if (null !== $extraLine) {
            parent::setExtraLine($extraLine);
        }
    }

    protected function setLocality(?string $locality): void
    {
        if (null !== $locality) {
            parent::setLocality($locality);
        }
    }

    protected function setPostalCode(?string $postalCode): void
    {
        if (null !== $postalCode) {
            parent::setPostalCode($postalCode);
        }
    }
}
