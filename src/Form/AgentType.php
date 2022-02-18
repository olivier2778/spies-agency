<?php

namespace App\Form;
use App\Entity\Speciality;
use App\Entity\Agent;
use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType ;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('agent_last_name')
            ->add('agent_first_name')
            ->add('agent_birth_date' ,  DateType::class,[
                'widget' => 'choice',
                'format' => 'd-M-y',
                'years' => range(date("Y") - 60, date("Y") - 10) ,
                ])
            ->add('agent_identification_code')
            ->add('nationality')
            ->add('specialities' , EntityType::class, [
                'choice_label' => 'speciality_name', 
                'class' => Speciality::class,
                'mapped' => true,
                'multiple' => true,
                'expanded' => true,
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agent::class,
        ]);
    }
}
