<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Phone;

use Deliwrapp\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Phone Object.
 *
 * {@inheritDoc}
 */
interface PhoneInterface extends ComplexValueObjectInterface
{
    public const CONFIG_KEEP_RAW_INPUT = 'keepRawInput';
    public const COUNTRY_CODE          = 'countryCode';
    public const NUMBER                = 'number';
    public const REGION                = 'region';
}
