<?php

namespace App\Form;

use App\Dictionary\GenderDictionary;
use App\DTO\Request\UserRequestDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, [
                'property_path' => 'firstName',
            ])
            ->add('last_name', TextType::class, [
                'property_path' => 'lastName',
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    GenderDictionary::MALE => GenderDictionary::MALE,
                    GenderDictionary::FEMALE => GenderDictionary::FEMALE,
                ],
            ])
            ->add('email', EmailType::class)
            ->add('address', TextType::class)
            ->add('state', TextType::class)
            ->add('city', TextType::class)
            ->add('zip', TextType::class)
            ->add('country_code', TextType::class, [
                'property_path' => 'countryCode',
            ])
            ->add('birthday', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'input' => 'datetime',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserRequestDTO::class,
        ]);
    }
}
