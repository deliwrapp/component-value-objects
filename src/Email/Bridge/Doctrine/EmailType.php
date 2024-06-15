<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Email\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Deliwrapp\Component\ValueObjects\Email\Email;

use function Safe\sprintf;

/**
 * A custom datatype to persist an Email Value Object with Doctrine.
 */
final class EmailType extends Type
{
    /** @var string */
    public const NAME = 'email';

    /**
     * @param array<string,mixed> $column
     *
     * @codeCoverageIgnore
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($column);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return 255;
    }

    /**
     * @psalm-suppress MixedArgument
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Email
    {
        if (null === $value || '' === $value) {
            return null;
        }

        return new Email($value);
    }

    /**
     * @param Email|string|null $value
     *
     * @psalm-suppress DocblockTypeContradiction
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if ($value instanceof Email) {
            $value = $value->toString();
        }

        if (false === \is_string($value)) {
            throw new \InvalidArgumentException(sprintf('An email field accepts only valid email addresses, as "string" or as "%s".', Email::class, $value));
        }

        // Validate the $value as a valid email
        $validator = new EmailValidator();

        if ( ! $validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException(sprintf('An email field accepts only valid email addresses. The value "%s" is not a valid email.', $value));
        }

        // The value is automatically transformed into a string thans to the __toString() method
        return $value;
    }

    /**
     * @codeCoverageIgnore
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return ! parent::requiresSQLCommentHint($platform);
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
