<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Money;

use Money\Currency;
use Money\Money;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requirements of a Money object.
 *
 * {@inheritDoc}
 */
interface MoneyInterface extends ComplexValueObjectInterface
{
    public const BASE_AMOUNT  = 'baseAmount';
    public const HUMAN_AMOUNT = 'humanAmount';
    public const CURRENCY     = 'currency';

    /**
     * @return array<string,float|int|string> [
     *                                        'currency'    => $this->getCurrency()->getCode(),
     *                                        'baseAmount'  => $this->getBaseAmount(),
     *                                        'humanAmount' => $this->getHumanAmount(),
     *                                        ];
     */
    public function __toArray(): array;

    /**
     * Returns the monetary value represented by this object.
     */
    public function getBaseAmount(): string;

    /**
     * Returns the Money value in the human format, without the currency symbol.
     */
    public function getHumanAmount(): string;

    /**
     * Returns the currency of the monetary value represented by this
     * object.
     */
    public function getCurrency(): Currency;

    public function add(MoneyInterface $other): self;

    public function subtract(MoneyInterface $other): self;

    /**
     * @param int|string $divisor
     */
    public function divide($divisor, int $roundingMode = Money::ROUND_HALF_UP): MoneyInterface;

    /**
     * @param int|string $multiplier
     */
    public function multiply($multiplier, int $roundingMode = Money::ROUND_HALF_UP): MoneyInterface;
}
