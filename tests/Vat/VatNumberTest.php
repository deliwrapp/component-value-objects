<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Vat;

use PHPUnit\Framework\TestCase;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectInterface;
use Deliwrapp\Component\ValueObjects\Vat\VatNumber;
use Deliwrapp\Component\ValueObjects\Vat\VatNumberInterface;

/**
 * Tests the VatNumber Class.
 *
 * @since 2.3
 */
final class VatNumberTest extends TestCase
{
    /** @var array<string, string> */
    private const TEST_DATA = [
        VatNumberInterface::COUNTRY_CODE => 'IT',
        VatNumberInterface::NUMBER       => '01234567891',
        VatNumberInterface::VAT_NUMBER   => 'IT01234567891',
    ];

    public function testVatNumber(): void
    {
        $resource = new VatNumber(self::TEST_DATA);
        // Test the value object direct interface
        self::assertInstanceOf(VatNumberInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        self::assertSame(self::TEST_DATA[VatNumberInterface::COUNTRY_CODE], $resource->getCountryCode());
        self::assertSame(self::TEST_DATA[VatNumberInterface::NUMBER], $resource->getNumber());
        self::assertSame(self::TEST_DATA[VatNumberInterface::VAT_NUMBER], $resource->getVatNumber());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
