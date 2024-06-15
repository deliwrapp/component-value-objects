<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Phone;

use libphonenumber\PhoneNumber;
use PHPUnit\Framework\TestCase;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectInterface;
use Deliwrapp\Component\ValueObjects\Phone\Phone;
use Deliwrapp\Component\ValueObjects\Phone\PhoneInterface;

final class PhoneTest extends TestCase
{
    /** @var array<string, string> */
    private const TEST = [
        PhoneInterface::NUMBER => '3331234567',
        PhoneInterface::REGION => 'IT',
    ];

    public function testPhone(): void
    {
        $resource = new Phone(self::TEST);
        // Test the value object direct interface
        self::assertInstanceOf(PhoneInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        // Test inherits the base object
        self::assertInstanceOf(PhoneNumber::class, $resource);
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
