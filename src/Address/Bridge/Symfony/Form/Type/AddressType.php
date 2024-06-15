<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Address\Bridge\Symfony\Form\Type;

use Deliwrapp\Component\ValueObjects\Address\AddressInterface;
use Deliwrapp\Component\ValueObjects\Address\Bridge\Symfony\Form\DataTransformer\AddressTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


final class AddressType extends AbstractType
{
    /** @var string */
    private const LABEL = 'label';

    /** @var string */
    private const TRANSLATION_DOMAIN = 'translation_domain';

    /** @var string */
    private const SHQ_ADDRESS = 'shq_address';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addModelTransformer(new AddressTransformer())
            ->add(AddressInterface::COUNTRY_CODE, CountryType::class, [self::LABEL => 'shq.address.form.country_code.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add(AddressInterface::ADMINISTRATIVE_AREA, TextType::class, [self::LABEL => 'shq.address.form.administrative_area.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add(AddressInterface::LOCALITY, TextType::class, [self::LABEL => 'shq.address.form.locality.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add(AddressInterface::DEPENDENT_LOCALITY, TextType::class, ['required' => false, self::LABEL => 'shq.address.form.dependent_locality.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add(AddressInterface::POSTAL_CODE, TextType::class, [self::LABEL => 'shq.address.form.postal_code.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add(AddressInterface::STREET, TextType::class, [self::LABEL => 'shq.address.form.street.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add(AddressInterface::EXTRA_LINE, TextType::class, ['required' => false, self::LABEL => 'shq.address.form.extra_line.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS]);
    }
}
