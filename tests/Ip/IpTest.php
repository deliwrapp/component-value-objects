<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Ip;

use PHPUnit\Framework\TestCase;
use Deliwrapp\Component\ValueObjects\Common\SimpleValueObjectInterface;
use Deliwrapp\Component\ValueObjects\Ip\Ip;
use Deliwrapp\Component\ValueObjects\Ip\IpInterface;

/**
 * Tests the Ip class.
 */
final class IpTest extends TestCase
{
    /** @var string */
    private const TEST = '127.0.0.1';

    public function testIp(): void
    {
        $resource = new Ip(self::TEST);
        // Test the value object direct interface
        self::assertInstanceOf(IpInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);
        self::assertIsString($resource->toString());
    }
}
