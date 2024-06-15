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
use Deliwrapp\Component\ValueObjects\Common\SimpleValueObjectInterface;
use Deliwrapp\Component\ValueObjects\Vat\VatRate;
use Deliwrapp\Component\ValueObjects\Vat\VatRateInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
final class VatRateTest extends TestCase
{
    /** @var array<string, float|string> */
    private const TEST_DATA = [
        VatRateInterface::COUNTRY_CODE => 'IT',
        VatRateInterface::PERCENTAGE   => 22.0000,
    ];

    public function testTax(): void
    {
        $resource = new VatRate(self::TEST_DATA[VatRateInterface::COUNTRY_CODE]);
        // Test the value object direct interface
        self::assertInstanceOf(VatRateInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);
        self::assertSame(self::TEST_DATA[VatRateInterface::COUNTRY_CODE], $resource->getCountryCode());
        self::assertSame(self::TEST_DATA[VatRateInterface::PERCENTAGE], $resource->getPercentage());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
