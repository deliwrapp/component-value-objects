<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Payment;

use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Payment Object.
 *
 * {@inheritDoc}
 *
 * @todo Define a list of possible statuses
 */
interface PaymentInterface extends ComplexValueObjectInterface
{
    public const METHOD = 'method';
    public const STATUS = 'status';

    /**
     * Returns the payment name.
     *
     * @return string The payment name
     *
     * @since Alpha
     */
    public function getMethod(): string;

    /**
     * Returns the payment status.
     *
     * @return string|null The payment status
     *
     * @since Alpha
     */
    public function getStatus(): ?string;
}
