<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Zone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,array('label'=>'Nom de la zone', 'attr'=>array('required'=>'required','class'=>'form-control form-group')))
            ->add('pays', EntityType::class,array( 'class'=>Pays::class,'label'=>'Choisir le pays', 'attr'=>array('required'=>'required','class'=>'form-control form-group')))
            ->add('Enregistrer', SubmitType::class,array('attr'=>array('class'=>'btn btn-primary form-group ')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Zone::class,
        ]);
    }
}
