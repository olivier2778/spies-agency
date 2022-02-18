<?php

namespace App\Form;

use App\Entity\Target;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TargetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('target_last_name')
            ->add('target_first_name')
            ->add('target_birth_date')
            ->add('target_code_name')
            ->add('mission')
            ->add('nationality')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Target::class,
        ]);
    }
}
