<?php

namespace App\Form;

use App\Entity\PointSurveillance;
use App\Entity\Zone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PointSurveillanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class,array('label'=>'Code', 'attr'=>array('required'=>'required','class'=>'form-control form-group')))
            ->add('cordonnes', TextType::class,array('label'=>'Cordonnees', 'attr'=>array('required'=>'required','class'=>'form-control form-group')))
            ->add('zone', EntityType::class,array( 'class'=>Zone::class,'label'=>'Zone', 'attr'=>array('required'=>'required','class'=>'form-control form-group')))
            ->add('Enregistrer',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary form-group ')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PointSurveillance::class,
        ]);
    }
}
