<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Money\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Deliwrapp\Component\ValueObjects\Money\Bridge\Doctrine\MoneyType;

final class MoneyTypeTest extends TestCase
{
    private MoneyType $type;

    /**
     * @var AbstractPlatform&MockObject
     *
     * @suppress PhanWriteOnlyPrivateProperty
     */
    private MockObject $platform;

    protected function setUp(): void
    {
        if (false === Type::hasType(MoneyType::NAME)) {
            Type::addType(MoneyType::NAME, MoneyType::class);
        }

        /** @var MoneyType $type */
        $type           = Type::getType(MoneyType::NAME);
        $this->type     = $type;
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('money', $this->type->getName());
    }
}
