<?php

namespace App\Form;
use App\Entity\Status;
use App\Entity\Speciality;
use App\Entity\Mission;
use App\Entity\TypeMission;
use App\Entity\Country;
use App\Entity\Agent;
use App\Entity\Contact;
use App\Entity\Hideaway;
use App\Entity\Target;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mission_title' , TextType::class, [
                'label'=>'Titre',
                ])

            ->add('mission_description', TextType::class, [
                'label'=>'Description',
                ])

            ->add('mission_code_name', TextType::class, [
                'label'=>'Nom de code',
                ])            
             
             ->add('mission_start_date' ,  DateType::class,[
                'widget' => 'choice',
                'format' => 'd-M-y',
                'years' => range(date("Y") - 5, date("Y") + 5) ,
                'label'=>'Date de Debut',
                ])    

            ->add('mission_end_date' ,  DateType::class,[
                'widget' => 'choice',
                'format' => 'd-M-y',
                'years' => range(date("Y") - 5, date("Y") + 5) ,
                'label'=>'Date de Fin',
                ])    
         
           
            ->add('typeMission', EntityType::class, [
                'class' => TypeMission::class,
                'choice_label' => 'typeMission_name',
                'label'=>'Type',
                'required' => true,
            ])

            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'status_name',
                'label'=>'Statut',
                'required' => true,
            ])

            ->add('speciality', EntityType::class, [
                'class' => Speciality::class,
                'choice_label' => 'speciality_name',
                'label'=>'Spécialité',
                'required' => true,
            ])
            
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'country_name',
                'label'=>'Pays',
                ])
        
            ->add('agent', EntityType::class, [
                'class' => Agent::class,
                'label'=>'Agent',
                'choice_label' => function (Agent $agent) {
                    return $agent->getAgentFirstName() . ' ' . $agent->getAgentLastName()  ;
                },
                'required' => true,
                'multiple' => true
            ])    

            ->add('contact', EntityType::class, [
                'class' => Contact::class,
                'label'=>'Contact',
                'choice_label' => function (Contact $contact) {
                    return $contact->getContactFirstName() . ' ' . $contact->getContactLastName()  ;
                },
                'required' => true,
                'multiple' => true
            ])     
            
            ->add('target', EntityType::class, [
                'class' => Target::class,
                'label'=>'Cible',
                'choice_label' => function (Target $target) {
                    return $target->getTargetFirstName() . ' ' . $target->getTargetLastName()  ;
                },
                'required' => true,
                'multiple' => true
            ])         
            
            ->add('hideaway', EntityType::class, [
                'class' => Hideaway::class,
                'label'=>'Planque',
                'choice_label' => function (Hideaway $hideaway) {
                    return $hideaway->getHideawayCode()  ;
                },
                'required' => true,
                'multiple' => true
            ])     
                 
           

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
