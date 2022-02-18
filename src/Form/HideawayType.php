<?php

namespace App\Form;

use App\Entity\Hideaway;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HideawayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hideaway_code')
            ->add('hideaway_adress')
            ->add('country')
            ->add('typeHideaway')
            ->add('missions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hideaway::class,
        ]);
    }
}
