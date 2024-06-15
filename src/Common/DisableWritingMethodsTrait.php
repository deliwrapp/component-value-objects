<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Common;

/**
 * Implements basic constructor for complex value objects.
 */
trait DisableWritingMethodsTrait
{
    /**
     * @see {@link ValueObjectInterface}
     */
    public function __set(string $field, $value): void
    {
    }
}
