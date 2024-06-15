<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Payment;

use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectTrait;
use Deliwrapp\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Defines the minimum requisites of a Payment Object.
 *
 * @todo Define a list of possible statuses
 */
final class Payment implements PaymentInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** The payment name or title. */
    private string $method;

    /** Status of the payment: paid or not? Or in which status? */
    private string $status;

    public function __toString(): string
    {
        return $this->method . ': ' . $this->status;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * @param string $name The payment name
     */
    protected function setMethod(string $name): void
    {
        $this->method = $name;
    }

    /**
     * @param string $status The actual status of the payment
     */
    protected function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
