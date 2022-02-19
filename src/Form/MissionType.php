<?php

namespace App\Form;

use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mission_title')
            ->add('mission_description')
            ->add('mission_code_name')
            ->add('mission_start_date')
            ->add('mission_end_date')
            ->add('typeMission')
            ->add('status')
            ->add('speciality')
            ->add('country')
            ->add('agent')
            ->add('contact')
            ->add('hideaway')
            ->add('targets')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
