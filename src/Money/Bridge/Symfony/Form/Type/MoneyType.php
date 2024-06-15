<?php

declare(strict_types=1);

/*
 * This file is part of the Deliwrapp Value Objects Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deliwrapp\Component\ValueObjects\Money\Bridge\Symfony\Form\Type;

use Deliwrapp\Component\ValueObjects\Money\Bridge\Symfony\Form\DataTransformer\MoneyTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType as SfMoneyType;
use Symfony\Component\Form\FormBuilderInterface;

final class MoneyType extends AbstractType
{
    /**
     * @psalm-suppress MixedArgumentTypeCoercion
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer(new MoneyTransformer($options));
    }

    public function getParent(): string
    {
        return SfMoneyType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'shq_money';
    }
}
