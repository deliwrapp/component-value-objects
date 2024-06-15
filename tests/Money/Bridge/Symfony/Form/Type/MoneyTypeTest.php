<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tests\Money\Bridge\Symfony\Form\Type;

use Deliwrapp\Component\ValueObjects\Money\Bridge\Symfony\Form\Type\MoneyType;
use Deliwrapp\Component\ValueObjects\Money\Money;
use Deliwrapp\Component\ValueObjects\Money\MoneyInterface;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Tests the MoneyType class.
 */
final class MoneyTypeTest extends TypeTestCase
{
    public function testMoney(): void
    {
        $values = [
            MoneyInterface::HUMAN_AMOUNT => '12,45',
            MoneyInterface::CURRENCY     => 'EUR',
        ];

        $objectToCompare = new Money($values);
        $form            = $this->factory->create(MoneyType::class, $objectToCompare, ['data_class' => null]);

        $object = new Money($values);

        // submit the data to the form directly
        $form->submit($values[MoneyInterface::HUMAN_AMOUNT]);

        self::assertTrue($form->isSynchronized());

        // check that $objectToCompare was modified as expected when the form was submitted
        self::assertEquals($object, $objectToCompare);
    }

    public function testMoneyWithNullValues(): void
    {
        $values = [
            MoneyInterface::HUMAN_AMOUNT => '12,45',
            MoneyInterface::CURRENCY     => 'EUR',
        ];

        $objectToCompare = new Money($values);
        $form            = $this->factory->create(MoneyType::class, $objectToCompare, ['data_class' => null]);

        // submit the data to the form directly
        $form->submit($values[MoneyInterface::HUMAN_AMOUNT]);

        self::assertTrue($form->isSynchronized());
    }
}
