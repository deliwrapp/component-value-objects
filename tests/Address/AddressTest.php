<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Address;

use PHPUnit\Framework\TestCase;
use Deliwrapp\Component\ValueObjects\Address\Address;
use Deliwrapp\Component\ValueObjects\Address\AddressInterface;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Tests the Address class.
 */
final class AddressTest extends TestCase
{
    /** @var string[] */
    private const VALUES = [
        AddressInterface::COUNTRY_CODE        => 'IT',
        AddressInterface::ADMINISTRATIVE_AREA => 'Salerno',
        AddressInterface::LOCALITY            => 'Naples',
        AddressInterface::DEPENDENT_LOCALITY  => 'Dependent locality',
        AddressInterface::POSTAL_CODE         => '12345',
        AddressInterface::STREET              => 'Via via vieni via con me',
        AddressInterface::EXTRA_LINE          => 'Niente più ti lega a questi luoghi',
    ];

    public function testAddress(): void
    {
        $resource = new Address(self::VALUES);
        // Test the value object direct interface
        self::assertInstanceOf(AddressInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        self::assertSame(self::VALUES[AddressInterface::COUNTRY_CODE], $resource->getCountryCode());
        self::assertSame(self::VALUES[AddressInterface::ADMINISTRATIVE_AREA], $resource->getAdministrativeArea());
        self::assertSame(self::VALUES[AddressInterface::LOCALITY], $resource->getLocality());
        self::assertSame(self::VALUES[AddressInterface::DEPENDENT_LOCALITY], $resource->getDependentLocality());
        self::assertSame(self::VALUES[AddressInterface::POSTAL_CODE], $resource->getPostalCode());
        self::assertSame(self::VALUES[AddressInterface::STREET], $resource->getStreet());
        self::assertSame(self::VALUES[AddressInterface::EXTRA_LINE], $resource->getExtraLine());
    }

    public function testToStringThrowsAnException(): void
    {
        $resource = new Address([]);

        self::expectException(\RuntimeException::class);
        $resource->__toString();
    }
}
