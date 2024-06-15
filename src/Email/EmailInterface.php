<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Email;

use Deliwrapp\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of an Email value object.
 */
interface EmailInterface extends SimpleValueObjectInterface
{
    public const EMAIL    = 'email';
    public const MAIL_BOX = 'mailBox';
    public const HOST     = 'host';

    /**
     * Returns the original email passed to the object.
     */
    public function getEmail(): string;

    /**
     * The mail box part of the email (box@host.com).
     */
    public function getMailBox(): string;

    /**
     * Return the host part of the email (box@host.com).
     */
    public function getHost(): string;

    /**
     * Change the mailbox.
     *
     * This returns a new Email object.
     */
    public function changeMailBox(string $newMailBox): self;
}
