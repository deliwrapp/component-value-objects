<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Address\Bridge\Symfony\Form\DataTransformer;

use Deliwrapp\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;
use Symfony\Component\Form\DataTransformerInterface;

final class AddressTransformer implements DataTransformerInterface
{
    /**
     * Transforms an AddressEmbeddable into an array.
     *
     * @param AddressEmbeddable|null $address
     *
     * @return array<string,string|null>|null
     */
    public function transform($address): ?array
    {
        if ( ! $address instanceof AddressEmbeddable) {
            return null;
        }

        return $address->_toArray();
    }

    /**
     * Creates the AddressEmbeddable from the array.
     *
     * @param AddressEmbeddable|array<string,string|null>|null $address
     */
    public function reverseTransform($address): ?AddressEmbeddable
    {
        if (\is_array($address)) {
            $address = new AddressEmbeddable($address);
        }

        return $address;
    }
}
