<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Email;

use PHPUnit\Framework\TestCase;
use Deliwrapp\Component\ValueObjects\Common\SimpleValueObjectInterface;
use Deliwrapp\Component\ValueObjects\Email\Email;
use Deliwrapp\Component\ValueObjects\Email\EmailInterface;

/**
 * Tests the Email class.
 */
final class EmailTest extends TestCase
{
    public function testEmail(): void
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        // Test the value object direct interface
        self::assertInstanceOf(EmailInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        self::assertSame($test, $resource->getEmail());
        self::assertSame('user', $resource->getMailBox());
        self::assertSame('example.com', $resource->getHost());
        self::assertIsString($resource->toString());
    }

    /**
     * @suppress PhanNoopNew
     */
    public function testInvalidEmailThrowsAnException(): void
    {
        $test = 'user-example';

        $this->expectException(\InvalidArgumentException::class);
        new Email($test);
    }

    public function testChangeMailBox(): void
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        $result = $resource->changeMailBox('user2');

        self::assertSame('user2@example.com', $result->getEmail());
        self::assertNotSame($resource, $result);
    }
}
