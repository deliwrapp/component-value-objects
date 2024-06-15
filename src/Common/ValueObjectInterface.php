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
 * Defines the minimum requisites of Value Objects.
 */
interface ValueObjectInterface
{
    /**
     * The string representation of the object.
     *
     * @psalm-suppress MissingReturnType
     */
    public function __toString();

    /**
     * Disable the __set magic method.
     *
     * Implement this way:
     *
     *     public function __set($field, $value)
     *     {
     *         // Body MUST BE EMPTY
     *     }
     */
    public function __set(string $field, $value): void;

    /**
     * The string representation of the object.
     *
     * This method can accept options to refine the string returned.
     *
     * @param array<string,mixed> $options Options to use to format the output strinarray
     */
    public function toString(array $options = []): string;
}
