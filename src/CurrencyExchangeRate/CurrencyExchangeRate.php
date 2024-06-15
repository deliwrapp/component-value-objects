<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\CurrencyExchangeRate;

use Money\Currency;
use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectTrait;
use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;

final class CurrencyExchangeRate implements CurrencyExchangeRateInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    private float $exchangeRate;
    private ?\DateTimeInterface $exchangeRateDate;
    private Currency $from;
    private Currency $to;

    /**
     * Constructor.
     *
     * Required parameters are:
     *
     * - From: The Currency in which the amount is;
     * - To: The Currency in which the amount is converted/exchanged;
     * - ExchangeRate: The rate of the exchanging/conversion.
     *
     * @param array<string,Currency|\DateTime|float|int> $values = [
     *                                                           'From' => new Currency(''),
     *                                                           'To' => new Currency(''),
     *                                                           'ExchangeRate' => 1.1,
     *                                                           'ExchangeRateDate' => new \DateTime(),
     *                                                           ]
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);
    }

    /**
     * @psalm-suppress InvalidOperand
     */
    public function __toString(): string
    {
        $string       = '1 ' . $this->getFrom() . ' is equal to ' . $this->getExchangeRate() . ' ' . $this->getTo();
        $exchangeRate = $this->getExchangeRateDate();
        if ($exchangeRate instanceof \DateTimeInterface) {
            $string .= ' on ' . $exchangeRate->format('Y-m-d H:i:s');
        }

        return $string;
    }

    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    public function getExchangeRateDate(): ?\DateTimeInterface
    {
        return $this->exchangeRateDate;
    }

    public function getFrom(): Currency
    {
        return $this->from;
    }

    public function getTo(): Currency
    {
        return $this->to;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Set the conversion rate of the currency.
     */
    protected function setExchangeRate(float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Set the conversion rate of the currency.
     */
    protected function setExchangeRateDate(\DateTimeInterface $exchangeRateDate): void
    {
        $this->exchangeRateDate = $exchangeRateDate;
    }

    /**
     * The Currency in which the base amount is.
     */
    protected function setFrom(Currency $from): void
    {
        $this->from = $from;
    }

    /**
     * The Currency in which the base amount has to be converted.
     */
    protected function setTo(Currency $to): void
    {
        $this->to = $to;
    }
}
