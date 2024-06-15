<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Tax;

use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectTrait;
use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;
use Deliwrapp\Component\ValueObjects\Money\MoneyInterface;

/**
 * Default implementation of a Tax Value object.
 */
final class Tax implements TaxInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** A string that identifies uniquely the tax on the Remote system */
    private string $code;

    /** @var bool If the tax is compound or not */
    private bool $compound = false;

    /** The rate of the tax */
    private float $rate;

    /** The paid amount of taxes */
    private MoneyInterface $amount;

    /** The title of the tax on the Remote system */
    private string $title;

    public function __toString(): string
    {
        return $this->code . ' ' . $this->amount;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function getAmount(): ?MoneyInterface
    {
        return $this->amount;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function isCompound(): ?bool
    {
        return $this->compound;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Sets the code of the Tax on the remote system.
     *
     * @param string $code Is a string that identifies the Tax on the Remote System
     */
    protected function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Method to set the compound amount of taxes.
     */
    protected function setCompound(bool $compound): void
    {
        $this->compound = $compound;
    }

    /**
     * Method to set the rate of the tax.
     *
     * @param float $rate The rate of the tax
     */
    protected function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Method to set the paid amount of taxes.
     */
    protected function setAmount(MoneyInterface $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Sets the title of the Tax on the remote system.
     *
     * @param string $title The title of the Tax on the Remote system
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
