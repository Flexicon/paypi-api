<?php

namespace App\Form;

use App\DTO\Request\TransactionRequestDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('provider', TextType::class)
            ->add('type', TextType::class)
            ->add('amount', NumberType::class)
            ->add('currency', TextType::class)
            ->add('user', UserType::class)
            ->add('attributes', AttributesType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TransactionRequestDTO::class,
        ]);
    }
}
