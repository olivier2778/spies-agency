<?php

namespace App\Form;
use App\Entity\Speciality;
use App\Entity\Agent;
use App\Entity\Nationality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder           
            
            ->add('agent_last_name' , TextType::class, [
                'label'=>'Nom',
                ])
            
            ->add('agent_first_name' , TextType::class, [
                'label'=>'Prénom',
                ])

            ->add('agent_birth_date' ,  DateType::class,[
                'widget' => 'choice',
                'format' => 'd-M-y',
                'years' => range(date("Y") - 60, date("Y") - 10) ,
                'label'=>'Date de Naissance',
                ])
            
            ->add('agent_identification_code' , TextType::class, [
                'label'=>'Code d\'Identification',
                ])
            
            ->add('nationality', EntityType::class, [
                'class' => Nationality::class,
                'choice_label' => 'nationality_name',
                'label'=>'Nationalité',
                'required' => true,
            ])

            ->add('specialities' , EntityType::class, [
                'choice_label' => 'speciality_name', 
                'class' => Speciality::class,
                'label'=>'Spécialité',
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
