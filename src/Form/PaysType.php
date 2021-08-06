<?php

namespace App\Form;

use App\Entity\Pays;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id', TextType::class,array('label'=>'Id', 'attr'=>array('class'=>'form-control form-group')))
            ->add('nom', TextType::class,array('label'=>'Nom du pays', 'attr'=>array('required'=>'required','class'=>'form-control form-group')))
            ->add('Enregistrer',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary form-group ')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pays::class,
        ]);
    }
}
